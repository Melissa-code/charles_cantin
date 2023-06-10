imgBgs = document.querySelectorAll('.img-bg');
imgLegends = document.querySelectorAll('.img-legend');
photos = document.querySelectorAll('.img-fluid');

/**
 * Diplay the legend of a photo
 * @param legend
 */
function displayTitle(legend) {
    legend.style.display = 'inline-block';
    legend.style.color = '#FFFFFF';
    legend.style.margin = '30px';
    legend.style.position = 'absolute';
    legend.style.fontWeight = "semibold";
}

/**
 * Mouseover & mouseout events to display or hide the legend of the photo
 */
for(let i = 0; i < imgBgs.length; i++) {
    for (let i = 0; i < imgLegends.length; i++) {
        for (let i = 0; i < photos.length; i++) {
            // Display the legend of the photo
            imgBgs[i].addEventListener('mouseover', () => {
                displayTitle(imgLegends[i]);
                imgBgs[i].style.backgroundColor = '#000000';
                imgBgs[i].style.opacity = '0.8';
            });
            // Hide the legend of the photo
            imgBgs[i].addEventListener('mouseout', () => {
                imgLegends[i].style.display = 'none';
                photos[i].style.display = 'inline-block';
                imgBgs[i].style.opacity = '1';
                imgBgs[i].style.backgroundColor = 'none';
            });
        }
    }
}




