class Pagination {

    constructor(element) {

        this.element = element;

        this.totalPages =
            Number(
                element.dataset.totalPages
            ) || 1;

        this.currentPage =
            Number(
                element.dataset.currentPage
            ) || 1;

        this.windowSize =
            Number(
                element.dataset.windowSize
            ) || 5;


        this.pageStart = 1;


        this.pageButtons =
            element.querySelectorAll(
                ".page-btn"
            );

        this.firstButton =
            element.querySelector(
                ".pagination-first"
            );

        this.prevButton =
            element.querySelector(
                ".pagination-prev"
            );

        this.nextButton =
            element.querySelector(
                ".pagination-next"
            );

        this.lastButton =
            element.querySelector(
                ".pagination-last"
            );


        this.bindEvents();

        this.update();
    }


    bindEvents() {

        this.pageButtons.forEach(button => {

            button.addEventListener(
                "click",
                event => {

                    event.preventDefault();

                    this.goTo(
                        Number(
                            button.dataset.paginationPage
                        )
                    );
                }
            );

        });


        this.firstButton.addEventListener(
            "click",
            event => {

                event.preventDefault();

                this.goTo(1);
            }
        );


        this.prevButton.addEventListener(
            "click",
            event => {

                event.preventDefault();

                this.previous();
            }
        );


        this.nextButton.addEventListener(
            "click",
            event => {

                event.preventDefault();

                this.next();
            }
        );


        this.lastButton.addEventListener(
            "click",
            event => {

                event.preventDefault();

                this.goTo(
                    this.totalPages
                );
            }
        );

    }


    goTo(page) {

        page = Math.max(
            1,
            Math.min(
                Number(page),
                this.totalPages
            )
        );


        if (
            page === this.currentPage
        ) {
            return;
        }


        this.currentPage = page;

        this.update();

        this.emitChange();
    }


    previous() {

        if (this.currentPage <= 1) {
            return;
        }

        this.currentPage--;

        this.update();

        this.emitChange();
    }


    next() {

        if (
            this.currentPage >=
            this.totalPages
        ) {
            return;
        }

        this.currentPage++;

        this.update();

        this.emitChange();
    }


    update() {

        this.updatePageNumbers();

        this.updateNavigation();
    }


    updatePageNumbers() {

        this.pageStart =
            Math.floor(
                (this.currentPage - 1) /
                this.windowSize
            )
            * this.windowSize
            + 1;


        this.pageButtons.forEach(
            (button, index) => {

                const page =
                    this.pageStart + index;


                button.dataset.paginationPage =
                    page;


                button.textContent =
                    page;


                button.parentElement.style.display =
                    page <= this.totalPages
                        ? ""
                        : "none";


                button.classList.toggle(
                    "active",
                    page === this.currentPage
                );

            }
        );
    }


    updateNavigation() {

        const first =
            this.currentPage === 1;


        const last =
            this.currentPage ===
            this.totalPages;


        this.firstButton.parentElement
            .classList.toggle(
            "disabled",
            first
        );


        this.prevButton.parentElement
            .classList.toggle(
            "disabled",
            first
        );


        this.nextButton.parentElement
            .classList.toggle(
            "disabled",
            last
        );


        this.lastButton.parentElement
            .classList.toggle(
            "disabled",
            last
        );
    }


    setTotalPages(totalPages) {

        this.totalPages =
            Math.max(
                1,
                Number(totalPages) || 1
            );


        if (
            this.currentPage >
            this.totalPages
        ) {

            this.currentPage =
                this.totalPages;
        }


        this.update();
    }


    setPage(page) {

        page = Math.max(
            1,
            Math.min(
                Number(page),
                this.totalPages
            )
        );


        this.currentPage = page;

        this.update();
    }


    getCurrentPage() {

        return this.currentPage;
    }


    emitChange() {

        this.element.dispatchEvent(
            new CustomEvent(
                "pagination:change",
                {
                    detail: {
                        page:
                        this.currentPage
                    }
                }
            )
        );

    }

}