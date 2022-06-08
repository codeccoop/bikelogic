(function () {
  var images = Array.apply(null, document.getElementsByTagName("img")).filter(function (
    img
  ) {
    return !(img.offsetParent === null || img.classList.contains("avatar"));
  });
  var promises = [];
  for (var i = 0; i < images.length; i++) {
    var image = images[i];
    if (!image.complete) {
      promises.push(
        new Promise(function (res, rej) {
          image.onload = res;
          image.onerror = res;
        })
      );
    }
  }

  if (promises.length && !location.hash.match(/^\#contact/)) {
    Promise.all(promises)
      .then(res => console.log("Promise.all then: ", res))
      .catch(err => console.error("Promise.all error: ", err))
      .finally(hideLoader);
  } else {
    hideLoader(false);
  }

  function hideLoader(transition) {
    var loader = document.getElementById("pageLoader");
    loader.classList.add("hidden");

    if (transition !== false) {
      setTimeout(function () {
        loader.parentElement.removeChild(loader);
      }, 600);
    } else {
      loader.parentElement.removeChild(loader);
    }
  }
})();
