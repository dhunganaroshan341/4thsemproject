<style>
.unsplash-image
{
    z-index: -1;
    position:fixed;
   top:0;left:0;
    width:100%;
    height: 180vh;
  image-rendering:optimizeQuality;

}

.imagecontainer{
  width:max-content;

}
</style>

<div id="imagecontainer" class="imagecontainer">
<img src="" alt="unsplash-image" id ="unsplash-image" class = "unsplash-image"> 
</div>


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>
    // Your Unsplash API access key (client ID)
    const accessKey = 'wf2BJfzE0LgHPQYAvnMmacJrX1H96LVg-ZJp9gh0rK8';

    // Function to fetch images from Unsplash API
    function fetchImage() {
      const apiUrl = 'https://api.unsplash.com/photos/random?client_id=' + accessKey;

      axios.get(apiUrl)
        .then(response => {
          const imageUrl = response.data.urls.regular;
          const imageElement = document.getElementById('unsplash-image');
          imageElement.setAttribute('src', imageUrl);
          imageElement.setAttribute('width', '800'); // Adjust width as needed
          imageElement.setAttribute('height', '600'); // Adjust height as needed
        })
        .catch(error => {
          console.error('Error fetching image:', error);
        });
    }

    // Call the fetchImage function to load an image on page load
    window.addEventListener('load', fetchImage);
  </script>