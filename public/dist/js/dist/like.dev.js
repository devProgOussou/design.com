"use strict";

$('.like').on('click', function (event) {
  event.preventDefault();
  postId = event.target.parentNode.parentNode.dataset['postId'];
  var isLike = event.target.previousElementSibling == null;
  $.ajax({
    method: 'POST',
    url: urlLike,
    data: {
      isLike: isLike,
      postId: postId,
      _token: token
    }
  }).done(function () {
    event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'Vous avez aimez cette affiche' : 'Like' : event.target.innerText == 'Dislike' ? 'Vous naimez pas cette affiche' : 'Dislike';

    if (isLike) {
      event.target.nextElementSibling.innerText = 'Dislike';
    } else {
      event.target.previousElementSibling.innerText = 'Like';
    }
  });
});