// The shared navigation exposes its open state to screen readers and supports Escape.
const menuButton = document.querySelector('.menu-toggle');
const siteNav = document.querySelector('#site-nav');

if (menuButton && siteNav) {
    const closeMenu = () => {
        menuButton.setAttribute('aria-expanded', 'false');
        siteNav.classList.remove('open');
    };

    menuButton.addEventListener('click', () => {
        const isOpen = menuButton.getAttribute('aria-expanded') === 'true';
        menuButton.setAttribute('aria-expanded', String(!isOpen));
        siteNav.classList.toggle('open', !isOpen);
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && menuButton.getAttribute('aria-expanded') === 'true') {
            closeMenu();
            menuButton.focus();
        }
    });

    document.addEventListener('click', (event) => {
        if (!menuButton.contains(event.target) && !siteNav.contains(event.target)) {
            closeMenu();
        }
    });
}

// Search and banner filters combine to control the same database-rendered Blade rows.
const directorySearch = document.querySelector('[data-directory-search]');
const directoryTable = document.querySelector('[data-directory-table]');
const filterButtons = [...document.querySelectorAll('[data-directory-filter]')];

if (directorySearch && directoryTable) {
    const rows = [...directoryTable.querySelectorAll('tbody tr')];
    const count = document.querySelector('[data-directory-count]');
    const empty = document.querySelector('[data-directory-empty]');
    let selectedGroup = '';

    const updateDirectory = () => {
        const query = directorySearch.value.trim().toLocaleLowerCase();
        let visible = 0;
        for (const row of rows) {
            const matchesSearch = row.textContent.toLocaleLowerCase().includes(query);
            const matchesGroup = !selectedGroup || row.dataset.filterValue === selectedGroup;
            row.hidden = !(matchesSearch && matchesGroup);
            visible += Number(!row.hidden);
        }
        const noun = directoryTable.dataset.directoryKind === 'tasks' ? 'task' : 'account';
        count.textContent = `${visible} ${visible === 1 ? noun : noun + 's'} shown${selectedGroup ? ' · ' + selectedGroup : ''}`;
        empty.hidden = visible !== 0;
    };

    directorySearch.addEventListener('input', updateDirectory);
    for (const button of filterButtons) {
        button.addEventListener('click', () => {
            // Pressing the selected group again restores the complete directory.
            selectedGroup = selectedGroup === button.dataset.directoryFilter ? '' : button.dataset.directoryFilter;
            for (const item of filterButtons) {
                item.setAttribute('aria-pressed', String(item.dataset.directoryFilter === selectedGroup));
            }
            updateDirectory();
        });
    }
}

// The explainer swaps educational copy without a page reload or a server request.
const energySteps = {
    panels: ['01 / CAPTURE', 'Start with sunlight.', 'Photovoltaic panels convert sunlight into direct current electricity. Roof space and shade help determine the panel layout.'],
    inverter: ['02 / CONVERT', 'Make the energy usable.', 'The inverter converts direct current from the panels into alternating current for household appliances. Its capacity must suit the proposed system.'],
    home: ['03 / USE', 'Power everyday routines.', 'The home uses the electricity produced by the system. In a grid connected setup, the grid can supply additional power when solar production is insufficient.']
};
const energyButtons = [...document.querySelectorAll('[data-energy]')];
for (const button of energyButtons) {
    button.addEventListener('click', () => {
        const [label, title, description] = energySteps[button.dataset.energy];
        document.querySelector('[data-energy-label]').textContent = label;
        document.querySelector('[data-energy-title]').textContent = title;
        document.querySelector('[data-energy-description]').textContent = description;
        for (const item of energyButtons) {
            item.setAttribute('aria-pressed', String(item === button));
        }
    });
}

// Each image marker changes one shared detail panel; no extra pages or database writes are needed.
const rooftopDetails = {
    panels: ['01 / SOLAR ARRAY', '5.5 kWp on the rooftop', "The sample system's rated panel capacity. Actual output varies with sunlight, shade, and site conditions."],
    crew: ['02 / INSTALLATION CREW', 'People behind the panels', 'The crew coordinates mounting, wiring, and equipment checks. Site planning and proper safety practices guide the installation.'],
    home: ['03 / THE CUSTOMER', 'Built around everyday use', "A proposal starts with the household's electricity use and roof conditions. Explore the Task List to see the sample schedule."]
};
const rooftopMarkers = [...document.querySelectorAll('[data-rooftop]')];
for (const marker of rooftopMarkers) {
    marker.addEventListener('click', () => {
        const [label, title, copy] = rooftopDetails[marker.dataset.rooftop];
        document.querySelector('[data-rooftop-label]').textContent = label;
        document.querySelector('[data-rooftop-title]').textContent = title;
        document.querySelector('[data-rooftop-copy]').textContent = copy;
        // aria-pressed communicates the selected marker to assistive technology.
        for (const item of rooftopMarkers) {
            item.setAttribute('aria-pressed', String(item === marker));
        }
    });
}

// Profile topics update one shared panel and announce the selected explanation.
const profileTopics = [...document.querySelectorAll('[data-profile-topic]')];
for (const button of profileTopics) {
    button.addEventListener('click', () => {
        document.querySelector('[data-profile-detail-title]').textContent = button.dataset.profileTitle;
        document.querySelector('[data-profile-detail-copy]').textContent = button.dataset.profileCopy;
        for (const topic of profileTopics) {
            topic.setAttribute('aria-pressed', String(topic === button));
        }
    });
}
