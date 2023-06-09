import React from 'react';
import MovieItem from './MovieItem';

const MovieList = ({ movies, onDeleteMovie, onUpdateRating }) => {
  return (
    <ul>
      {movies.map((movie) => (
        <MovieItem
          key={movie.id}
          movie={movie}
          onDeleteMovie={onDeleteMovie}
          onUpdateRating={onUpdateRating}
        />
      ))}
    </ul>
  );
};

export default MovieList;
