

<!-- modal -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        function reload() {
            location.reload()
        }
        function toggleInformation(bool) {
            // <div id="information-container" style="display: none;"></div>
            var container = document.getElementById('information-container');

            if (container.style.display === 'none' || container.innerHTML === '') {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '../information-view.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        container.innerHTML = xhr.responseText;
                        container.style.display = 'block';
                    }
                };
                xhr.send();
            } else {
                container.style.display = 'none';
            }


        }
        document.addEventListener('click', function (event) {
            var container = document.getElementById('information-container');
            var button = document.querySelector('button[onclick="toggleInformation()"]');
            if (container.style.display === 'block' && !container.contains(event.target) && !button.contains(event.target)) {
                container.style.display = 'none';
            }
        });</script>