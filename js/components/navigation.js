export default function initNavigation() {

	// Highlight page links when corresponding page content is on screen
	// Choosing intersection observer here not CSS only due to compatability
	const links = document.querySelectorAll('#page-section-links a');
	const sections = document.querySelectorAll('section[id]');

	const visibleSections = new Set();

	const observer = new IntersectionObserver((entries) => {
	    entries.forEach(entry => {
	        if (entry.isIntersecting) {
	            visibleSections.add(entry.target.id);
	        } else {
	            visibleSections.delete(entry.target.id);
	        }
	    });

	    links.forEach(link => {
	        const id = link.getAttribute('href').slice(1);
	        link.classList.toggle('active', visibleSections.has(id));
	    });
	}, { root: null, rootMargin: '-50% 0px -50% 0px', threshold: 0 });

	sections.forEach(section => observer.observe(section));
}