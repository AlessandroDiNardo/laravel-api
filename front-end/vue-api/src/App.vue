<script >
import axios from 'axios';
const API_URL = 'http://localhost:8000/api/';
const API_VER = 'v1/';
const API = API_URL + API_VER;
const EMPTY_NEW_MOVIE = {
  tags_id: []
};
export default {
  data() {

    return {
      movies: [],
      genres: [],
      tags: [],
      new_movie: { ...EMPTY_NEW_MOVIE },
      state: {
        movieForm: false
      }
    }
  },
  methods: {

    editMovie(movie) {
      console.log('movie', movie);
      console.log('new_movie', this.new_movie);
      this.new_movie = { ...movie };
      this.new_movie.tags_id = [];
      for (let x = 0; x < movie.tags.length; x++) {
        const tag = movie.tags[x];
        this.new_movie.tags_id.push(tag.id);
      }
      this.state.movieForm = true;
    },
    deleteMovie(movie) {
      axios.delete(API + 'movie/delete/' + movie.id)
        .then(res => {
          const data = res.data;
          const success = data.success;
          if (success)
            this.updateData();
        })
        .catch(err => console.log);
    },
    submitMovie(e) {
      e.preventDefault();

      const new_movie = this.new_movie;
      const actualApi = API + (
        'id' in new_movie
          ? 'movie/update/' + this.new_movie.id
          : 'movie/store'
      );
      console.log(new_movie);
      console.log(actualApi);
      axios.post(actualApi, new_movie)
        .then(res => {
          const data = res.data;
          const success = data.success;
          if (success) {
            this.closeForm();
            this.updateData();
          }
        })
        .catch(err => console.log);
    },
    closeForm() {
      this.new_movie = { ...EMPTY_NEW_MOVIE };
      this.state.movieForm = false;
    },
    updateData() {
      axios.get(API + 'movie/all')
        .then(res => {
          const data = res.data;
          const success = data.success;
          const response = data.response;
          const movies = response.movies;
          const genres = response.genres;
          const tags = response.tags;
          if (success) {
            this.movies = movies;
            this.genres = genres;
            this.tags = tags;
          }
        })
        .catch(err => console.log);
    }
  },
  mounted() {
    this.updateData();
  }
};
</script>

<template>
  <div class="container">
    <h1>Movies</h1>
    <form v-if="state.movieForm">
      <label for="name">Name</label>
      <input type="text" name="name" v-model="new_movie.name">
      <br>
      <label for="year">Year</label>
      <input type="number" name="year" v-model="new_movie.year">
      <br>
      <label for="cashOut">Cash out</label>
      <input type="number" name="cashOut" v-model="new_movie.cashOut">
      <br>
      <label for="genre">Genre</label>
      <select name="genre_id" v-model="new_movie.genre_id">
        <option v-for="genre in genres" :key="genre.id" :value="genre.id">{{ genre.name }}</option>
      </select>
      <br>
      <label>Tags:</label>
      <br>
      <div v-for="tag in tags" :key="tag.id">
        <input type="checkbox" :id="'tag-' + tag.id" :value="tag.id" v-model="new_movie.tags_id">
        <label :for="'tag-' + tag.id">{{ tag.name }}</label>
      </div>

      <button @click="closeForm">CANCEL</button>
      <input type="submit" @click="submitMovie" id="btn"
        :value="'id' in new_movie ? 'UPDATE MOVIE: ' + new_movie.id : 'CREATE NEW MOVIE'">
    </form>
    <div v-else>
      <button @click="state.movieForm = true">CREATE NEW MOVIE</button>
      <ul class="film_cont">
        <li v-for="movie in movies" :key="movie.id" class="name">
          Title: {{ movie.name }}
          <br>

          <ul class="tag">
            Tags:
            <li v-for="tag in movie.tags" :key="tag.id">
              {{ tag.name }}
            </li>
          </ul>
          <div class="buttons">
            <button @click="editMovie(movie)">EDIT</button>
            <button @click="deleteMovie(movie)">DELETE</button>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<style scoped>
.container {

  text-align: center;
}


.film_cont,
.tag {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

.tag {
  padding: 20px 0;
}

.name {
  margin: 20px 0;
  border: 1px solid white;
  padding: 50px;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  width: 500px;
}

button,
#btn {
  margin: 0 10px;
  border: 1px solid rgb(0, 0, 0);
  border-radius: 10px;
  background-color: black;
  color: white;
  padding: 5px 20px;
}
</style>