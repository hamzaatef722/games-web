class ProfileLibrary {
  constructor(gameIds) {
    this.gameIds = gameIds;
    this.displayElement = document.querySelector("#profile-library-display");
    this.countElement = document.querySelector("#library-count");
    this.options = {
      method: "GET",
      headers: {
        "x-rapidapi-key": "bcd0861096msh2e3172db7bc7e48p132393jsnaaea4dc2cddc",
        "x-rapidapi-host": "free-to-play-games-database.p.rapidapi.com",
      },
    };
  }

  escapeHtml(value) {
    return String(value ?? "")
      .replaceAll("&", "&amp;")
      .replaceAll('"', "&quot;")
      .replaceAll("'", "&#039;")
      .replaceAll("<", "&lt;")
      .replaceAll(">", "&gt;");
  }

  async getGameDetails(gameId) {
    const api = await fetch(
      `https://free-to-play-games-database.p.rapidapi.com/api/game?id=${gameId}`,
      this.options
    );
    return api.json();
  }

  async displayLibrary() {
    if (!this.displayElement || this.gameIds.length === 0) {
      return;
    }

    try {
      const games = await Promise.all(this.gameIds.map((id) => this.getGameDetails(id)));
      this.displayGames(games);
    } catch (error) {
      this.displayElement.innerHTML = `
        <div class="col-12">
          <div class="empty-library text-center py-5">
            <h3 class="text-white mb-3">Could not load your library</h3>
            <p class="text-white-50 mb-0">Please refresh the page and try again.</p>
          </div>
        </div>`;
    }
  }

  displayGames(games) {
    let gameBox = "";

    for (let i = 0; i < games.length; i++) {
      const element = games[i];
      const game = {
        id: this.escapeHtml(element.id),
        title: this.escapeHtml(element.title),
        thumbnail: this.escapeHtml(element.thumbnail),
        genre: this.escapeHtml(element.genre),
        platform: this.escapeHtml(element.platform),
        game_url: this.escapeHtml(element.game_url),
        description: this.escapeHtml(element.short_description || element.description),
      };

      gameBox += `<div class="col-sm-6 col-lg-4 col-xl-3 library-game-item" data-game-id="${game.id}">
                    <div class="library-card h-100">
                      <button type="button" class="library-remove-btn" data-game-id="${game.id}" title="Remove from library">
                        <i class="fa-solid fa-trash"></i>
                      </button>
                      <img src="${game.thumbnail}" class="library-img" alt="${game.title}">
                      <div class="library-card-body">
                        <p class="text-info fw-bold small text-uppercase mb-2">${game.genre || "Game"}</p>
                        <h3 class="library-game-title text-white">${game.title}</h3>
                        <p class="library-platform mb-3">
                          <i class="fa-solid fa-desktop me-2"></i>${game.platform}
                        </p>
                        <p class="library-description mb-4">${game.description}</p>
                        <a href="${game.game_url}" target="_blank" class="btn btn-outline-info w-100 fw-bold">
                          SHOW GAME
                        </a>
                      </div>
                    </div>
                  </div>`;
    }

    this.displayElement.innerHTML = gameBox;
    this.bindRemoveButtons();
  }

  bindRemoveButtons() {
    this.displayElement.querySelectorAll(".library-remove-btn").forEach((button) => {
      button.addEventListener("click", () => this.removeGame(button));
    });
  }

  async removeGame(button) {
    const gameId = button.dataset.gameId;

    if (!gameId) {
      return;
    }

    button.disabled = true;

    try {
      const body = new URLSearchParams();
      body.append("game_id", gameId);

      const response = await fetch("remove_from_library.php", {
        method: "POST",
        body,
        headers: {
          Accept: "application/json",
          "Content-Type": "application/x-www-form-urlencoded",
          "X-Requested-With": "XMLHttpRequest",
        },
      });

      const data = await response.json();

      if (data.login_required) {
        window.location.href = data.login_url;
        return;
      }

      if (!data.success) {
        throw new Error(data.message || "Could not remove game.");
      }

      const item = button.closest(".library-game-item");
      item?.remove();
      this.updateCount();
      this.showEmptyStateIfNeeded();
    } catch (error) {
      button.disabled = false;
    }
  }

  updateCount() {
    if (!this.countElement) {
      return;
    }

    const currentCount = Number(this.countElement.textContent) || 0;
    this.countElement.textContent = Math.max(currentCount - 1, 0);
  }

  showEmptyStateIfNeeded() {
    if (!this.displayElement.querySelector(".library-game-item")) {
      this.displayElement.innerHTML = `
        <div class="col-12">
          <div class="empty-library text-center py-5">
            <div class="empty-icon mx-auto mb-4">
              <i class="fa-solid fa-layer-group"></i>
            </div>
            <h3 class="text-white mb-3">Your library is empty</h3>
            <p class="text-white-50 mb-4">Start adding games from the games page and they will show up here.</p>
            <a href="games.php" class="btn btn-gradient px-5 py-3 fw-bold">BROWSE GAMES</a>
          </div>
        </div>`;
    }
  }
}

const profileLibrary = new ProfileLibrary(window.libraryGameIds || []);
profileLibrary.displayLibrary();
