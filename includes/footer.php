</main> <footer class="bg-gray-900 text-white mt-auto">
    <div class="max-w-7xl mx-auto px-4 py-8">
      
      <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-8">
        <div>
          <h4 class="font-semibold mb-3">Contacto</h4>
          <ul class="space-y-2 text-sm text-gray-300">
            <li>Junín, Buenos Aires</li>
            <li><a href="mailto:info@autix.net.ar" class="hover:text-primary">info@autix.net.ar</a></li>
          </ul>
        </div>
        </div>

      <div class="border-t border-gray-700 pt-6">
        <div class="text-sm text-gray-400 text-center md:text-left">
          Copyright © <?php echo date('Y'); ?> autix. Todos los derechos reservados
        </div>
      </div>
    </div>
  </footer>

  <script>
    const btn = document.getElementById("menuBtn");
    const menu = document.getElementById("mobileMenu");
    const iconOpen = document.getElementById("menuIconOpen");
    const iconClose = document.getElementById("menuIconClose");

    if(btn && menu) {
        btn.addEventListener("click", () => {
          menu.classList.toggle("hidden");
          iconOpen.classList.toggle("hidden");
          iconClose.classList.toggle("hidden");

          if (!menu.classList.contains('hidden')) {
            document.body.style.overflow = 'hidden';
          } else {
            document.body.style.overflow = '';
          }
        });
    }
  
  </script>

</body>
</html>