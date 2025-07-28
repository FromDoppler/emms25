<section class="emms__centralvideo hidden--vip">
    <div class="emms__centralvideo__head">
        <h2>¡Obtén tu Pase Premium antes de que se agoten!</h2>
        <span>Compra tu entrada VIP sólo si…</span>
    </div>
    <div class="emms__container--lg reverse-mb">
        <ul class="emms__centralvideo__list emms__centralvideo__list--live emms__fade-in">
            <p class="emms__centralvideo__tag-play emms__centralvideo__tag-play--live tag-play--playable" id="playVideo">Dale play al video</p>
            <li>Te has quedado sin ideas para crear contenido</li>
            <li>Necesitas una asesoría personalizada </li>
            <li>Sientes que el crecimiento de tu negocio se ha estancado</li>
            <li>Necesitas aumentar tu visibilidad de marca</li>
            <li>Buscas una experiencia inmersiva de Marketing</li>
            <a href="./checkout" class="emms__cta">HAZTE VIP AHORA</a>
        </ul>
        <div class="emms__centralvideo__video lg emms__fade-in">
            <div id="player"></div>
        </div>
    </div>
</section>
<script src="https://www.youtube.com/iframe_api"></script>

<script>
    let player;
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            height: '315',
            width: '560',
            videoId: 'm25Kkj9M9v8',
            playerVars: {
                'rel': 0
            },
            events: {
                'onReady': onPlayerReady
            }
        });
    }

    function onPlayerReady(event) {
        const playParagraph = document.getElementById('playVideo');
        playParagraph.addEventListener('click', () => {
            player.playVideo();
        });
    }
</script>
