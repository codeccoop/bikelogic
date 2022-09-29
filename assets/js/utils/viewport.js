function setViewport() {
  var vh = window.innerHeight * 0.01;
  var vw = window.innerWidth * 0.01;

  document.documentElement.style.setProperty("--vw", `${vw}px`);
  document.documentElement.style.setProperty("--vh", `${vh}px`);
  console.log("setViewport");
}

// window.addEventListener("resize", setViewport);
// setViewport();
// setTimeout(setViewport, 250);
