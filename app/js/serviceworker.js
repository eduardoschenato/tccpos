self.addEventListener("install", (event) => {
    event.waitUntil(
      caches
        .open("v1")
        .then((cache) =>
            cache.addAll([
            './index.html',
            './individualAssesments.html',
            './individualAssesment.html',
            './collectiveAssesments.html',
            './collectiveAssesment.html',
            "./css/materialize.min.css",
            "./js/jquery-3.2.1.min.js",
            "./js/jmaterialize.min.js"
            ]),
        ),
    );
});