const portfolio = document.querySelector('[data-portfolio]');

if (portfolio) {
    const search = portfolio.querySelector('[data-video-search]');
    const categoryButtons = [...portfolio.querySelectorAll('[data-category]')].filter(element => element.tagName === 'BUTTON');
    const cards = [...portfolio.querySelectorAll('[data-video-card]')];
    const grid = portfolio.querySelector('[data-video-grid]');
    const sort = portfolio.querySelector('[data-video-sort]');
    const emptyState = portfolio.querySelector('[data-empty-state]');
    const resultCount = portfolio.querySelector('[data-result-count]');
    const dialog = portfolio.querySelector('[data-video-dialog]');
    const player = portfolio.querySelector('[data-video-player]');
    let category = 'All';

    const filterVideos = () => {
        const query = search.value.trim().toLocaleLowerCase();
        let visibleCount = 0;

        for (const card of cards) {
            const matchesCategory = category === 'All' || card.dataset.category === category;
            const matchesSearch = `${card.dataset.title} ${card.dataset.category}`.toLocaleLowerCase().includes(query);
            card.hidden = !(matchesCategory && matchesSearch);
            if (!card.hidden) {
                visibleCount += 1;
            }
        }

        resultCount.textContent = `${visibleCount} ${visibleCount === 1 ? 'video' : 'videos'}`;
        emptyState.hidden = visibleCount > 0;
        for (const button of categoryButtons) {
            button.setAttribute('aria-pressed', String(button.dataset.category === category));
        }
    };

    search.addEventListener('input', filterVideos);
    portfolio.querySelector('[data-search-form]').addEventListener('submit', event => {
        event.preventDefault();
        filterVideos();
    });

    for (const button of categoryButtons) {
        button.addEventListener('click', () => {
            category = button.dataset.category;
            filterVideos();
        });
    }

    sort.addEventListener('change', () => {
        const sortedCards = [...cards].sort((first, second) => sort.value === 'title'
            ? first.dataset.title.localeCompare(second.dataset.title)
            : Number(first.dataset.order) - Number(second.dataset.order));
        grid.append(...sortedCards);
    });

    portfolio.querySelector('[data-reset-filters]').addEventListener('click', () => {
        search.value = '';
        category = 'All';
        filterVideos();
        search.focus();
    });

    for (const button of portfolio.querySelectorAll('[data-play-video]')) {
        button.addEventListener('click', () => {
            const { videoId, videoTitle, videoCategory } = button.dataset;
            portfolio.querySelector('#player-title').textContent = videoTitle;
            portfolio.querySelector('[data-player-category]').textContent = videoCategory;
            player.title = videoTitle;
            player.src = `https://drive.google.com/file/d/${videoId}/preview`;
            dialog.showModal();
            document.documentElement.classList.add('video-is-open');
        });
    }

    portfolio.querySelector('[data-close-video]').addEventListener('click', () => dialog.close());
    dialog.addEventListener('click', event => {
        if (event.target === dialog) {
            const bounds = dialog.getBoundingClientRect();
            const outside = event.clientX < bounds.left || event.clientX > bounds.right || event.clientY < bounds.top || event.clientY > bounds.bottom;
            if (outside) {
                dialog.close();
            }
        }
    });
    dialog.addEventListener('close', () => {
        player.removeAttribute('src');
        document.documentElement.classList.remove('video-is-open');
    });
}
