
function display_product(image_loc)
{
$(".product_image").addClass('loading');
document.getElementById("product_image").innerHTML ="<img src='/img/products_images/"+image_loc+"' width='100%' class='img-rounded'>";
	
return false;	
}
