// 'js/mian.js'

// var slider_img = document.querySelector('.slider-img');
// var images = ['ia_300000013.jpg', 'ia_300000014.jpg', 'ia_300000015.jpg', 'ia_300000016.jpg', 'ia_300000017.jpg'];
// var i = 0;

// function prev(){
// 	if(i <= 0) i = images.length;	
// 	i--;
// 	return setImg();			 
// }

// function next(){
// 	if(i >= images.length-1) i = -1;
// 	i++;
// 	return setImg();			 
// }

// function setImg(){
// 	return slider_img.setAttribute('src', "/assets/img/All_Img/"+images[i]);
	
// }
// setInterval(next,5000);

// Zoom image 

//Cart_wrapper

// const imgs =document.querySelectorAll('.img-select a');
// const imgBtns =[...imgs];
// let imgId = 1;
// imgBtns.forEach((imgItem) =>{
// 	imgItem.addEventListener('click',(event) =>{
// 		event.preventDefault();
// 		imgId = imgItem.dataset.id;
// 		slideImage();
// 	});
// });
// function slideImage(){
// 	const displayWidth = document.querySelector('.img-showcase img:first-child').width;
// 	document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1)*displayWidth}px)`;
// }
// window.addEventListener('resize',slideImage);

const sizes = document.querySelectorAll('.size');

function changeSize(){
	sizes.forEach(size => size.classList.remove('active'));
	this.classList.add('active');
}

sizes.forEach(size => size.addEventListener('click',changeSize));

// const img_showcase = document.querySelectorAll(' .img-showcase');
// const magnifying_img = document.querySelectorAll(' .magnifying_img');

// img_showcase.addEventListener("mousemove", function(){
// 	clientX = event.clientX - img_showcase.offsetLeft
// 	clientY = event.clientY - img_showcase.offsetTop
	 
// 	mWidth = img_showcase.offsetWidth
// 	mHeight = img_showcase.offsetHeight

// 	clientX = clientX / mWidth * 100
// 	clientY = clientY / mHeight * 100

// 	magnifying_img.style.transform ='translate(- '+clientX+'%, -'+clientY+'%) scale(2)'
// });
// img_showcase.addEventListener("mouseleave", function(){
// 	magnifying_img.style.transform ='translate(-50%, -50%) scale(1)'
// });
// window.addEventListener("load", function(){
// 	var img_showcase = document.getElementByClassName
// })

// $(function () {
//     $(".magnifying_img").imagezoomsl({
//         zoomrange: [3, 3]
//     });
// });
// var options1 = {
//     width: 400,
//     height: 400,
//     zoomWidth: 500,
// 	zoomHeight:500,
//     offset: {vertical: 0, horizontal: 10},
// 	zoomOffsetX: 2
// };
// var options2 = {
//     fillContainer: true,
//     offset: {vertical: 0, horizontal: 10}
// };
// new ImageZoom(document.querySelector('.img-showcase'), options1 );

function toggleproduct(){
	const product_detail_show = document.querySelector('.product_detail_show');
	product_detail_show.classList.toggle('activeproduct');
	product_detail_show.classList.toggle('onscroll')
}
const accordion = document.getElementsByClassName('label');
for (i = 0; i<accordion.length; i++) {
	accordion[i].addEventListener('click',function(){
		this.classList.toggle('minus')
	})
}

///Product detail slider img
function clickme(smallImg) {

	var fullImg = document.getElementById("imagebox");
	fullImg.src = smallImg.src;

}


// ======================================
//setting default attribute to disabled of minus button
// document.querySelector(".minus-btn").addAttribute("disabled");

//taking value to increment decrement input value
// var valueCount

//taking price value in variable
// var price = document.getElementById("price").innerText;

// //price calculation function
// function priceTotal() {
// 	var total = valueCount * price;
// 	document.getElementById("price").innerText = total
// }

//plus button
// document.querySelector(".plus-btn").addEventListener("click", function() {
// 	//getting value of input
// 	valueCount = document.getElementById("quantity").value;

// 	//input value increment by 1
// 	valueCount++;

// 	//setting increment input value
// 	document.getElementById("quantity").value = valueCount;

// 	if (valueCount > 1) {
// 		document.querySelector(".minus-btn").removeAttribute("disabled");
// 		document.querySelector(".minus-btn").classList.remove("disabled")
// 	}

// 	//calling price function
// 	priceTotal()
// })

//plus button
// document.querySelector(".minus-btn").addEventListener("click", function() {
// 	//getting value of input
// 	valueCount = document.getElementById("quantity").value;

// 	//input value increment by 1
// 	valueCount--;

// 	//setting increment input value
// 	document.getElementById("quantity").value = valueCount

// 	if (valueCount == 1) {
// 		document.querySelector(".minus-btn").setAttribute("disabled", "disabled")
// 	}

// 	//calling price function
// 	priceTotal()
// })

///Accordion=================================================================
const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

accordionItemHeaders.forEach(accordionItemHeader => {
  accordionItemHeader.addEventListener("click", event => {
    
    // Uncomment in case you only want to allow for the display of only one collapsed item at a time!
    
    // const currentlyActiveAccordionItemHeader = document.querySelector(".accordion-item-header.active");
    // if(currentlyActiveAccordionItemHeader && currentlyActiveAccordionItemHeader!==accordionItemHeader) {
    //   currentlyActiveAccordionItemHeader.classList.toggle("active");
    //   currentlyActiveAccordionItemHeader.nextElementSibling.style.maxHeight = 0;
    // }

    accordionItemHeader.classList.toggle("active");
    const accordionItemBody = accordionItemHeader.nextElementSibling;
    if(accordionItemHeader.classList.contains("active")) {
      accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
    }
    else {
      accordionItemBody.style.maxHeight = 0;
    }
    
  });
});

  $(document).ready(function () {
  	$('#responsive').lightSlider({
  		item: 4,
  		loop: false,
  		slideMove: 1,
  		easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
  		speed: 600,
  		responsive: [{
  				breakpoint: 800,
  				settings: {
  					item: 3,
  					slideMove: 1,
  					slideMargin: 6,
  				}
  			},
  			{
  				breakpoint: 480,
  				settings: {
  					item: 2,
  					slideMove: 1
  				}
  			}
  		]
  	});
  });
  $(document).ready(function () {
  	$('#responsive1').lightSlider({
  		item: 4,
  		loop: false,
  		slideMove: 1,
  		easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
  		speed: 600,
  		responsive: [{
  				breakpoint: 800,
  				settings: {
  					item: 3,
  					slideMove: 1,
  					slideMargin: 6,
  				}
  			},
  			{
  				breakpoint: 480,
  				settings: {
  					item: 2,
  					slideMove: 1
  				}
  			}
  		]
  	});
  });
