    <script>
        const input = document.querySelector("#phone");
        const iti = window.intlTelInput(input, {
            separateDialCode: true,
            utilsScript: "src/<?= VERSION ?>/js/vendors/utils.js",
            initialCountry: "auto",
            geoIpLookup: callback => {
                fetch("https://ipapi.co/json")
                    .then(res => res.json())
                    .then(data => callback(data.country_code))
                    .catch(() => callback("AR"));
            }
        });
        const input2 = document.querySelector("#phone2");
        if (input2) {
            const iti2 = window.intlTelInput(input2, {
                separateDialCode: true,
                utilsScript: "src/<?= VERSION ?>/js/vendors/utils.js",
                initialCountry: "auto",
                geoIpLookup: callback => {
                    fetch("https://ipapi.co/json")
                        .then(res => res.json())
                        .then(data => callback(data.country_code))
                        .catch(() => callback("AR"));
                }
            });
        }
    </script>
