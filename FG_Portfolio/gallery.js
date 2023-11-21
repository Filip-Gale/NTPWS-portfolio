var targetSpan = document.getElementById('targetElement');

if (targetSpan) {
    targetSpan.textContent = "Digital";
} else {
    console.log('targetSpan element not found.');
}

async function digitalneSlike(endpoint) {
  if (targetSpan) {
    targetSpan.textContent = endpoint;
  }
  
  try {
    const linkmake = `https://portfolio-817d5-default-rtdb.europe-west1.firebasedatabase.app/` + endpoint + `.json`;
    const response = await fetch(linkmake);

    if (response.ok) {
      const data = await response.json();

      // Get the parent container where you want to append the image containers
      const parentContainer = document.getElementById('imageSection');
      parentContainer.innerHTML = '';

      // Loop through the object keys and create div elements with class 'image-container' for each object
      for (const key in data) {
        const item = data[key];
        const imageContainer = document.createElement('div');
        imageContainer.classList.add('image-container');

        // Access the id property of each item
        imageContainer.id = key;

        // Set the background image using inline style
        imageContainer.style.backgroundImage = `url('${item.url}')`;
        imageContainer.style.backgroundSize = `cover`;

        // Add a click event listener to each image container
        imageContainer.addEventListener('click', function() {
          // Extract the ID of the clicked image container
          const clickedImageId = this.id;

          // Redirect to another site with the specific image ID as a query parameter
          const redirectTo = 'pictureView.php';
          const urlWithId = `${redirectTo}`;
          localStorage.setItem('imageId', clickedImageId);
          localStorage.setItem('name', item.name);
          localStorage.setItem('originalName', item.originalName);
          localStorage.setItem('url',item.url);
          localStorage.setItem('endpoint',endpoint);
          window.location.href = urlWithId;
        });

        // Append the image container div to the parent container
        parentContainer.appendChild(imageContainer);
      }
    } else {
      console.error('Request failed with status:', response.status);
    }
  } catch (error) {
    console.error('There has been a problem with your fetch operation:', error);
  }
}

async function uploadImage(endpoint) {
  var imageName = '';
  var fileInput = document.getElementById('uploadImage');
  var file = fileInput.files[0];

  if (file) {
    var formData = new FormData();
    formData.append('image', file);

    // Generate a unique name for the uploaded image (for example, using a timestamp)
    imageName = new Date().getTime() + '_' + file.name;

    try {
      const uploadResponse = await fetch(`https://firebasestorage.googleapis.com/v0/b/portfolio-817d5.appspot.com/o/img%2F${imageName}?alt=media&token=3ae11a53-7c26-4d1c-9beb-9c8db8fb3ee2`, {
        method: 'POST',
        body: formData
      });

      if (uploadResponse.ok) {
        // Fetch the existing data from the provided endpoint
        const fetchDataResponse = await fetch(`https://portfolio-817d5-default-rtdb.europe-west1.firebasedatabase.app/${endpoint}.json`);
        const existingData = await fetchDataResponse.json();

        // Create a new object with the uploaded image URL and name
        const newImageObject = {
          name: imageName,
          originalName: imageName,
          url: `https://firebasestorage.googleapis.com/v0/b/portfolio-817d5.appspot.com/o/img%2F${imageName}?alt=media&token=3ae11a53-7c26-4d1c-9beb-9c8db8fb3ee2`
        };

        // Append the new image object to the existing data
        existingData.push(newImageObject);

        // Update the data in the Firebase Realtime Database using PUT method
        const putResponse = await fetch(`https://portfolio-817d5-default-rtdb.europe-west1.firebasedatabase.app/${endpoint}.json`, {
          method: 'PUT',
          body: JSON.stringify(existingData),
          headers: {
            'Content-Type': 'application/json'
          }
        });

        if (putResponse.ok) {
          console.log('Image data updated successfully.');
        } else {
          console.error('Failed to update image data.');
        }
      } else {
        console.error('Error uploading image:', uploadResponse.status);
      }
    } catch (error) {
      console.error('Error:', error);
    }
  } else {
    console.error('No image selected.');
  }
  fileInput.value = '';
  digitalneSlike(endpoint);
}

digitalneSlike('digital');