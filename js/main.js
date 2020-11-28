$("#searchForm").on("submit", function(e) {
   let searchText = $("#searchText").val();
   getMovies(searchText);
   e.preventDefault(); //stops from from actually submitting to file
   $(".main-movies").slideUp();
});

function getMovies(searchText) {
   axios
      .get(
         "https://api.themoviedb.org/3/search/movie?api_key=1512aa34ca08b654cc993f8e4e2e539e&query=" +
            searchText
      )

      .then(function(response) {
         console.log(response);
         let movies = response.data.results;
         let output = "";

         //after search
         $.each(movies, function(index, movie) {
            output += `
            <div class="col-xs-6 col-md-4 col-lg-3">
               <div class="text-center">
                  <img src="https://image.tmdb.org/t/p/w342${movie.poster_path}" alt="404 Not Found">
                  <a onclick="movieSelected('${movie.id}')" href="#"><h5>${movie.title}</h5></a>
               </div> 
            </div>
            `;
         });

         $("#movies").html(output);
      })
      .catch(function(error) {});
}

function movieSelected(id) {
   sessionStorage.setItem("movieId", id);
   window.location = "movie.html";
   return false;
}

function getMovie() {
   let movieId = sessionStorage.getItem("movieId");
   axios
      .get(
         "http://api.themoviedb.org/3/movie/" +
            movieId +
            "?api_key=1512aa34ca08b654cc993f8e4e2e539e&append_to_response=videos,credits,recommendations"
      )
      .then(function(response) {
         console.log(response);
         let movie = response.data;
         let genres_len = movie.genres.length;
         let genres = movie.genres;
         let gen = "";
         for (var i = 0; i < genres_len; i++) {
            if (i == genres_len - 1) {
               gen += genres[i].name;
            } else {
               gen += genres[i].name + ", ";
            }
         }
         let cast = response.data.credits.cast;
         let actors = "";
         for (var i = 0; i < 10; i++) {
            actors += `
                 <ul style="display: inline-block; font-size:24px;padding:10px;">
                 <li><img src="https://image.tmdb.org/t/p/w342${cast[i].profile_path}" class="cast_image"></li>
                 <li>${cast[i].name}</li>
                  </ul>
          `;
         }
         let vids = response.data.videos.results;
         let vid = "";
         if (vids.length < 2) {
            for (var i = 0; i < vids.length; i++) {
               if (vids.length == 0) {
                  vid += "No Trailers Avialable";
               } else {
                  vid += `
                <iframe width="420" height="315"
                src="https://www.youtube.com/embed/${vids[i].key}">
                </iframe>
                `;
               }
            }
         } else {
            for (var i = 0; i < 2; i++) {
               if (vids.length == 0) {
                  vid += "No Trailers Avialable";
               } else {
                  vid += `
                <iframe width="420" height="315"
                src="https://www.youtube.com/embed/${vids[i].key}">
                </iframe>
                `;
               }
            }
         }
         let recom = response.data.recommendations.results;
         let recomd = "";
         for (var i = 0; i < 8; i++) {
            recomd += `
            <div class="col-xs-6 col-md-4 col-lg-3">
               <div class="text-center">
                  <img src="https://image.tmdb.org/t/p/w185${recom[i].poster_path}" alt="404 Not Found">
                  <a onclick="movieSelected('${recom[i].id}')" href="#"><h5>${recom[i].title}</h5></a>
               </div> 
            </div>
            `;
         }
         console.log(recom);
         let output = `
         <div class = "row">
            <div class = "col-md-4">
            <img src="https://image.tmdb.org/t/p/w342${movie.poster_path}" class="poster">
            </div>
            <div class = "col-md-8">
            <a href="http://imdb.com/title/${movie.imdb_id}/"><h2 class="movieHead">${movie.title}</h2></a>
               <ul class="tilesWrap">
                  <li class="l">
                     <h2>Details</h2>
                     <h3>Details</h3>
                        <ul>
                           <li class=""><strong>Genre: </strong>${gen}</li>
                           <li class=""><strong>Released: </strong>${movie.release_date}</li>
                           <li class=""><strong>Runtime (mins): </strong>${movie.runtime}</li>
                           <li class=""><strong>Rating: </strong>${movie.vote_average}</li>
                     </ul>
                  </li>
               </ul>
              
            </div>
         </div>
         <div class = "row">
               <ul class="tilesWrap">
               <li class = "l l2">
               <h2>Plot</h2>
               <h3>Plot</h3>
               <p style="font-size:2rem">${movie.overview}</p>
               <hr>
               
                     
               </li>
            <ul>
         </div>
         <div class = "row">
            <ul class="tilesWrap">
            <li class="l l2">   
            <h3>Cast</h3>
            <h2>Cast</h2>
             ${actors}
            </li>
            </ul>
         </div>
         <div class = "row">
               <ul class="tilesWrap">
               <li class = "l l2">
               <h2>Trailers</h2>
               <h3>Trailers</h3>
               ${vid}
               <hr>
               </li>
            <ul>
         </div>
         <div class = "row">
               <ul class="tilesWrap">
               <li class = "l l2">
               <h2>Similar Movies</h2>
               <h3>Similar Movies</h3>
               ${recomd}
               <hr>
               </li>
            <ul>
         </div>
         `;

         $("#movie").html(output);
         $("title").html(movie.title);
      })
      .catch(function(error) {});
}

function scrollWin() {
   window.scrollBy(0, 200);
}

function todo() {
   scrollWin();
   getMovies(searchText);
}

function myFunction() {
   var x = document.getElementById("myTopnav");
   if (x.className === "topnav") {
      x.className += " responsive";
   } else {
      x.className = "topnav";
   }
}
