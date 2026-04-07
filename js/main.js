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

});