(function () {
  var images = document.getElementsByTagName("img");
  var promises = [];
  for (var i = 0; i < images.length; i++) {
    var image = images[i];
    if (!image.complete) {
      promises.push(
        new Promise(function (res, rej) {
          image.onload = res;
        })
      );
    }
  }

  if (promises.length) {
    Promise.all(promises).finally(function (res) {
      var loader = document.getElementById("pageLoader");
      loader.classList.add("hidden");
      setTimeout(function () {
        loader.parentElement.removeChild(loader);
      }, 600);
    });
  } else {
    var loader = document.getElementById("pageLoader");
    loader.parentElement.removeChild(loader);
  }
})();
