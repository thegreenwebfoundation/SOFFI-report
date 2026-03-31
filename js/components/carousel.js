export default function initCarousel() {

	document.querySelectorAll('.carousel').forEach((carousel) => {
		const slider_scroll = carousel.querySelector('.slider');
		const slider_item_size = slider_scroll.querySelector('.slide').clientWidth;
		const nextButton = carousel.querySelector('.next');
		const prevButton = carousel.querySelector('.prev');

		function updateButtonStates() {
			const scrollLeft = slider_scroll.scrollLeft;
			const maxScroll = slider_scroll.scrollWidth - slider_scroll.clientWidth;

			prevButton.disabled = scrollLeft <= 0;
			nextButton.disabled = scrollLeft >= maxScroll;
		}

		nextButton.addEventListener('click', scrollToNextSlide);
		prevButton.addEventListener('click', scrollToPrevSlide);

		slider_scroll.addEventListener('scroll', updateButtonStates);

		function scrollToNextSlide() {
			slider_scroll.scrollBy(slider_item_size, 0);
		}

		function scrollToPrevSlide() {
			slider_scroll.scrollBy(-slider_item_size, 0);
		}

		updateButtonStates();
	});

}