(function () {
  var vw = {
    t: document.documentElement.scrollTop,
    b: document.documentElement.scrollTop + window.innerHeight,
  };
  var images = Array.apply(null, document.getElementsByTagName("img")).filter(function (
    img
  ) {
    var bbox = img.getBoundingClientRect();
    return (
      !(img.offsetParent === null || img.classList.contains("avatar")) &&
      ((bbox.top >= vw.t && bbox.bottom - bbox.height < vw.b) ||
        (bbox.bottom >= vw.b && bbox.top + bbox.height > vw.t) ||
        (bbox.top >= vw.t && vw.bottom <= vw.b))
    );
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

  var isOnContact = location.hash.match(/^\#contact/);
  if (promises.length && !isOnContact) {
    Promise.all(promises)
      .then(res => console.log("Promise.all then: ", res))
      .catch(err => console.error("Promise.all error: ", err))
      .finally(hideLoader);
  } else {
    hideLoader(!isOnContact);
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
