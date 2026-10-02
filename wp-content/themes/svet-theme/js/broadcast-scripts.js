document.addEventListener('DOMContentLoaded', function () {

    if (typeof Fancybox === 'undefined') {
        console.warn('Fancybox не найден');
        return;
    }

    document.addEventListener('click', function (event) {

        const broadcastLink = event.target.closest(
            '.broadcast-item__video'
        );

        if (!broadcastLink) {
            return;
        }

        event.preventDefault();

        const videoUrl = broadcastLink.getAttribute('href');
        const broadcastId = broadcastLink.dataset.videoId;

        if (!videoUrl) {
            return;
        }

        const contentElement = document.querySelector(
            '#broadcast-content-' + broadcastId
        );

        const embedUrl = getBroadcastEmbedUrl(videoUrl);

        let html = `
            <div class="video-popup">

                <div class="video-popup__video">
                    <iframe
                        src="${embedUrl}"
                        title="Эфир"
                        frameborder="0"
                        allow="autoplay; fullscreen; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>
        `;

        if (contentElement) {
            html += `
                <div class="video-popup__content">
                    ${contentElement.innerHTML}
                </div>
            `;
        }

        html += `
            </div>
        `;

        Fancybox.show([
            {
                html: html
            }
        ]);

    });

});


function getBroadcastEmbedUrl(url) {

    try {

        const parsedUrl = new URL(url);

        /*
         * YouTube
         */
        if (
            parsedUrl.hostname.includes('youtube.com') ||
            parsedUrl.hostname.includes('youtu.be')
        ) {

            let videoId = '';

            // https://youtu.be/VIDEO_ID
            if (parsedUrl.hostname.includes('youtu.be')) {

                videoId = parsedUrl.pathname
                    .replace('/', '')
                    .split('/')[0];

            }

            // https://www.youtube.com/watch?v=VIDEO_ID
            if (
                parsedUrl.hostname.includes('youtube.com') &&
                parsedUrl.searchParams.has('v')
            ) {

                videoId = parsedUrl.searchParams.get('v');

            }

            // https://www.youtube.com/embed/VIDEO_ID
            if (parsedUrl.pathname.includes('/embed/')) {

                videoId = parsedUrl.pathname
                    .split('/embed/')[1]
                    .split('/')[0];

            }

            if (videoId) {

                return (
                    'https://www.youtube.com/embed/' +
                    videoId +
                    '?autoplay=1'
                );

            }

        }

        /*
         * Если это не YouTube,
         * возвращаем исходную ссылку.
         */
        return url;

    } catch (error) {

        console.error('Ошибка обработки URL эфира:', error);

        return url;

    }

}