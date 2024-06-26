<footer>
        <!-- un tableau d'horaires -->
        <table id="horaires">
            <tr>
                <td>Lundi</td>
                <td>10H00-14H00 & 16H00-19H00</td>
            </tr>
            <tr>
                <td>Mardi</td>
                <td>10H00-14H00 & 16H00-19H00</td>
            </tr>
            <tr>
                <td>Mercredi</td>
                <td>10H00-14H00 & 16H00-19H00</td>
            </tr>
            <tr>
                <td>Jeudi</td>
                <td>10H00-14H00 & 16H00-19H00</td>
            </tr>
            <tr>
                <td>Vendredi</td>
                <td>10H00-14H00 & 16H00-19H00</td>
            </tr>
            <tr>
                <td>Samedi</td>
                <td>Fermé</td>
            </tr>
            <tr>
                <td>Dimanche</td>
                <td>Fermé</td>
            </tr>
        </table>
        <!-- un div contenant les coordonnées tel addresse et mail -->
        <div id="coordon">
                <h2>Nos coordonnées :</h2>
                <img src="{{ asset('Images/logotel.png') }}" alt="phone img">
                <p>056/58.84.82</p>
                <img src="{{ asset('Images/logomap.png') }}" alt="mapLogo img">
                <p><a href="https://maps.app.goo.gl/oRAindBqFdBJojiH9">Rue de Saint-Léger 8, 7711 Mouscron</a></p>
                <img src="{{ asset('Images/6386842.png') }}" alt="E-mail img">
                <p>noemiiea@icloud.com</p>
        </div>
        <!-- div regroupant les liens vers instagram et Facebook -->
        <div id="reseaux">
            <h2>Nos réseaux :</h2>
            <a
                href="https://www.instagram.com/au_ptit_vivo/?fbclid=IwAR1CNkM5GovYbJ8qmzST1r4Igil0PetYIRPgB2fWuXJt0r9z6BV-0IkXjlY"><img
                    src="{{ asset('Images/logoinsta.png') }}" alt="Instagram"></a>
            <a href="https://www.facebook.com/profile.php?id=100063936575056"><img src="{{ asset('Images/logofb.png') }}"
                    alt="Facebook"></a>
        </div>
        <!-- les liens vers le CSS et HTML validator -->
        <p>
            <a href="http://jigsaw.w3.org/css-validator/check/referer">
                <img style="border:0;width:88px;height:31px"
                    src="{{ asset('Images/W3C_HTML5_certified.png') }}"
                    alt="html Valide !" />
            </a>
        </p>
            <p>
                <a href="http://jigsaw.w3.org/css-validator/check/referer">
                    <img style="border:0;width:88px;height:31px"
                        src="http://jigsaw.w3.org/css-validator/images/vcss"
                        alt="CSS Valide !" />
                </a>
            </p>
    </footer>