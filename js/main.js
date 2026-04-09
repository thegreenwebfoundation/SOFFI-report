import initNavigation from './components/navigation.js';
import initCarousel from './components/carousel.js';
import { annotate } from 'rough-notation';

document.addEventListener("DOMContentLoaded", () => {

	initNavigation();
	initCarousel();

	const elements = document.querySelectorAll('.annotate');
	elements.forEach(el => {
		const annotation = annotate(el, {
			type: 'highlight',
			color: '#CBFFCB',
			animate: false,
			multiline: true,
			iterations: 1,
			padding: [0, 2]
		});
		annotation.show();
	});


	const progressBar = document.querySelector('.progress-bar-inner');
	function updateProgress() {
	  const scrollTop = window.scrollY;
	  const docHeight = document.documentElement.scrollHeight - window.innerHeight;
	  const progress = docHeight > 0 ? (scrollTop / docHeight) : 0;
	  const percent = Math.min(Math.max(progress * 100, 0), 100);
	  progressBar.style.clipPath = `inset(0 ${100 - percent}% 0 0)`;
	}
	window.addEventListener('scroll', updateProgress, { passive: true });
	updateProgress();
});