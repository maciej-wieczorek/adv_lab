import React, { useState, useEffect } from 'react';
import MovieList from './MovieList';
import './App.css';

const App = () => {
  const [movies, setMovies] = useState([]);
  const [newMovie, setNewMovie] = useState({
    title: '',
    description: '',
    image: '',
    rating: 1,
  });

  useEffect(() => {
    fetchMovies();
  }, []);

  const fetchMovies = async () => {
    try {
      const response = await fetch('/movies.json');
      const data = await response.json();
      setMovies(data.movies);
    } catch (error) {
      console.log('Error fetching movies:', error);
    }
  };

  const deleteMovie = (movieId) => {
    setMovies((prevMovies) =>
      prevMovies.filter((movie) => movie.id !== movieId)
    );
  };

  const updateRating = (movieId, newRating) => {
    setMovies((prevMovies) =>
      prevMovies.map((movie) => {
        if (movie.id === movieId) {
          return { ...movie, rating: newRating };
        }
        return movie;
      })
    );
  };

  const handleInputChange = (event) => {
    setNewMovie((prevMovie) => ({
      ...prevMovie,
      [event.target.name]: event.target.value,
    }));
  };

  const handleAddMovie = (event) => {
    event.preventDefault();
    const newMovieWithId = {
      ...newMovie,
      id: Date.now(),
    };
    setMovies((prevMovies) => [...prevMovies, newMovieWithId]);
    setNewMovie({
      title: '',
      description: '',
      image: '',
      rating: 1,
    });
  };

  return (
    <div className="App">
      <h1>Movie Collection</h1>
      <form onSubmit={handleAddMovie}>
        <input
          type="text"
          name="title"
          placeholder="Title"
          value={newMovie.title}
          onChange={handleInputChange}
        />
        <br />
        <textarea
          name="description"
          placeholder="Description"
          value={newMovie.description}
          onChange={handleInputChange}
        ></textarea>
        <br />
        <input
          type="text"
          name="image"
          placeholder="Image URL"
          value={newMovie.image}
          onChange={handleInputChange}
        />
        <br />
        <input
          type="number"
          name="rating"
          min="1"
          max="5"
          value={newMovie.rating}
          onChange={handleInputChange}
        />
        <br />
        <button type="submit">Add Movie</button>
      </form>
      {movies.length ? (
        <MovieList
          movies={movies}
          onDeleteMovie={deleteMovie}
          onUpdateRating={updateRating}
        />
      ) : (
        <p>No movies found.</p>
      )}
    </div>
  );
};

export default App;