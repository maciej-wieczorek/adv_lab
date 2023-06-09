import React from 'react';

const MovieItem = ({ movie, onDeleteMovie, onUpdateRating }) => {
  const { title, description, image, rating } = movie;

  const handleDeleteClick = () => {
    onDeleteMovie(movie.id);
  };

  const handleRatingChange = (event) => {
    const newRating = event.target.value;
    onUpdateRating(movie.id, newRating);
  };

  return (
    <li>
      <img src={image} alt={title} />
      <h3>{title}</h3>
      <p>{description}</p>
      <input
        type="number"
        min="1"
        max="5"
        value={rating}
        onChange={handleRatingChange}
      />
      <button onClick={handleDeleteClick}>Delete</button>
    </li>
  );
};

export default MovieItem;