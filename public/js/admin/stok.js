
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        function switchWarehouse(warehouseId) {
            // Hide all warehouse tabs
            const panes = document.querySelectorAll('.tab-content-pane');
            panes.forEach(pane => {
                pane.classList.remove('active');
            });

            // Remove active from all buttons
            const buttons = document.querySelectorAll('.warehouse-tab');
            buttons.forEach(btn => {
                btn.classList.remove('active');
            });

            // Show selected warehouse
            document.getElementById(warehouseId).classList.add('active');

            // Add active to clicked button
            const clickedButton = document.querySelector(`.warehouse-tab[onclick="switchWarehouse('${warehouseId}')"]`);
            if (clickedButton) {
                clickedButton.classList.add('active');
            }
        }

        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.querySelector('.menu-toggle');
            
            if (window.innerWidth < 768 && 
                !sidebar.contains(event.target) && 
                !toggle.contains(event.target)) {
                sidebar.classList.remove('active');
            }
        });
   