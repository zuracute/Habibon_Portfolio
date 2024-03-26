<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
              <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUNLVVoET1MJdK8TddtSNrylcorTNLV0M&libraries=places&callback=initMap"></script>
              </body>
              </html>
    
              <script>
              // itu ay para sa sidebar yung hamburger yan ah if mag close ka sa labas ng sidebar yan ah
              var offcanvasElement = document.getElementById('offcanvasWithBothOptions');
              offcanvasElement.addEventListener('hidden.bs.offcanvas', function () {
              var toggleOffcanvasCheckbox = document.getElementById('toggleOffcanvas');
              toggleOffcanvasCheckbox.checked = false;
              });

              document.addEventListener('click', function(event) {
              const sidebar = document.querySelector('.sidebar');
              const toggleOffcanvas = document.getElementById('toggleOffcanvas');
              const target = event.target;

              // Check if the click is outside the sidebar and the sidebar is open
              if (!sidebar.contains(target) && toggleOffcanvas.checked) {
              toggleOffcanvas.checked = false; // Close the sidebar
              }
              });
          </script>