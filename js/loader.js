(function () {
  var images = document.getElementsByTagName("img");
  var promises = [];
  for (var i = 0; i < images.length; i++) {
    var image = images[i];
    if (!image.complete) {
      promises.push(
        new Promise(function (res, rej) {
          image.loadend = res;
        })
      );
    }
  }

  if (promises.length) {
    Promise.all(promises)
      .then(res => console.log("Promise.all then: ", res))
      .catch(err => console.error("Promise.all error: ", err))
      .finally(hideLoader);
  } else {
    hideLoader();
  }

  setTimeout(hideLoader, 2000);

  function hideLoader(transition) {
    var loader = document.getElementById("pageLoader");
    loader.classList.add("hidden");

    if (transition === true) {
      setTimeout(function () {
        loader.parentElement.removeChild(loader);
      }, 600);
    } else {
      loader.parentElement.removeChild(loader);
    }
  }
})();
