 // Basculement de thème
 const themeToggle = document.getElementById('theme-toggle');
 const html = document.documentElement;
 
 themeToggle.addEventListener('click', () => {
     html.classList.toggle('light');
     html.classList.toggle('dark');
 });
 
 // Définir l'année en cours
 document.getElementById('year').textContent = new Date().getFullYear();
 
 // Soumission du formulaire
 const contactForm = document.getElementById('contact-form');
 
 contactForm.addEventListener('submit', (e) => {
     e.preventDefault();
     
     // Obtenir les valeurs du formulaire
     const name = document.getElementById('name').value;
     const email = document.getElementById('email').value;
     const sujet = document.getElementById('sujet').value;
     const message = document.getElementById('message').value;
     
     // Validation simple
     if (!name || !email || !message) {
         alert('Please fill in all required fields');
         return;
     }
     
     // Dans une vraie application, les données seraient envoyées à un serveur
     console.log('Form submitted:', { name, email, sujet, message });
     
     // Affichage message de réussite
     alert(`Thanks for your message, ${name}! I'll get back to you soon.`);
     
     // Réinitialiser le formulaire
     contactForm.reset();
 });
 
 // Défilement fluide pour les liens d'ancrage
 document.querySelectorAll('a[href^="#"]').forEach(anchor => {
     anchor.addEventListener('click', function (e) {
         e.preventDefault();
         
         document.querySelector(this.getAttribute('href')).scrollIntoView({
             behavior: 'smooth'
         });
     });
 });