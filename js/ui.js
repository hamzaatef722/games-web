// الملف دا بنعرض منه الالعاب و تفاصيل اللالعاب يعني فيه : displayGames , displayDetails

export class Ui {
  constructor() {
    window.addGameToLibrary = (button) => this.saveLibraryGame(button);
  }

  async saveLibraryGame(button) {
    const gameId = button.dataset.gameId;
    const icon = button.querySelector("i");
    const label = button.querySelector(".library-btn-label");
    const message = document.querySelector("#library-message");

    if (!gameId) {
      this.showLibraryMessage(message, "Game id is missing.", "error");
      return;
    }

    button.disabled = true;
    button.classList.add("is-loading");
    this.showLibraryMessage(message, "Saving...", "info");

    try {
      const body = new URLSearchParams();
      body.append("game_id", gameId);

      const response = await fetch("add_to_library.php", {
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
        throw new Error(data.message || "Could not add game.");
      }

      this.markLibraryButtonAdded(button);

      this.showLibraryMessage(
        message,
        "Game added to your library.",
        "success",
      );
    } catch (error) {
      button.disabled = false;
      button.classList.remove("is-loading");
      this.showLibraryMessage(
        message,
        "Could not add this game. Please try again.",
        "error",
      );
    }
  }

  showLibraryMessage(messageElement, text, type) {
    if (!messageElement) {
      return;
    }

    messageElement.textContent = text;
    messageElement.className = `library-message ${type}`;
  }

  markLibraryButtonAdded(button) {
    const icon = button.querySelector("i");
    const label = button.querySelector(".library-btn-label");

    button.classList.add("saved");
    button.classList.remove("is-loading");
    button.disabled = true;

    if (icon) {
      icon.classList.remove("fa-regular");
      icon.classList.add("fa-solid");
    }

    if (label) {
      label.textContent = "Added";
    }
  }

  async syncLibraryButton(gameId) {
    const button = document.querySelector(`.details-heart-btn[data-game-id="${gameId}"]`);
    const message = document.querySelector("#library-message");

    if (!button) {
      return;
    }

    try {
      const response = await fetch(`library_status.php?game_id=${encodeURIComponent(gameId)}`, {
        headers: {
          Accept: "application/json",
          "X-Requested-With": "XMLHttpRequest",
        },
      });
      const data = await response.json();

      if (data.success && data.added) {
        this.markLibraryButtonAdded(button);
        this.showLibraryMessage(message, "This game is already in your library.", "success");
      }
    } catch (error) {
      return;
    }
  }

  escapeHtml(value) {
    return String(value ?? "")
      .replaceAll("&", "&amp;")
      .replaceAll('"', "&quot;")
      .replaceAll("'", "&#039;")
      .replaceAll("<", "&lt;")
      .replaceAll(">", "&gt;");
  }

  displayGames(gameData) {
    let gameBox = "";
    for (let i = 0; i < gameData.length; i++) {
      const element = gameData[i];
      const game = {
        id: this.escapeHtml(element.id),
        title: this.escapeHtml(element.title),
        thumbnail: this.escapeHtml(element.thumbnail),
        genre: this.escapeHtml(element.genre),
        platform: this.escapeHtml(element.platform),
        game_url: this.escapeHtml(element.game_url),
        short_description: this.escapeHtml(element.short_description),
      };
      gameBox += `<div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                        <div role="button" game-id="${game.id}" class="card game-card border-0 w-100" style="background-color: var(--bg-card); border-radius: 12px; overflow: hidden;">
                            <img src="${game.thumbnail}" class="card-img-top" alt="${game.title}">
                            <div class="card-body py-3">
                                <p class="text-info fw-bold small text-uppercase mb-1" style="letter-spacing: 1px;">${game.genre}</p>
                                <h5 class="fw-bold text-white mb-0 text-truncate">${game.title}</h5>
                            </div>
                            <!-- Overlay slides up on hover -->
                            <div class="game-overlay">
                                <p class="text-info fw-bold small text-uppercase mb-1" style="letter-spacing: 1px;">${game.genre}</p>
                                <h6 class="fw-bold text-white mb-2">${game.title}</h6>
                                <p class="game-description mb-0">${game.short_description}</p>
                            </div>
                        </div>
                    </div>`;
    }
    document.querySelector("#games-display").innerHTML = gameBox;
  }
  displayDetails(gameDetails) {
    const game = {
      id: this.escapeHtml(gameDetails.id),
      title: this.escapeHtml(gameDetails.title),
      thumbnail: this.escapeHtml(gameDetails.thumbnail),
      genre: this.escapeHtml(gameDetails.genre),
      platform: this.escapeHtml(gameDetails.platform),
      status: this.escapeHtml(gameDetails.status),
      description: this.escapeHtml(gameDetails.description),
      game_url: this.escapeHtml(gameDetails.game_url),
    };
    const detailsContent = `<div class="col-md-4">
                    <img src="${game.thumbnail}" class="img-fluid" alt="${game.title}">
                </div>
                <div class="col-md-8">
                    <h3>Title: ${game.title}</h3>
                    <p>
                        <span>Category: </span>
                        <span class="details-info text-center text-bg-primary">${game.genre}</span>
                    </p>
                    <p>
                        <span>Platform: </span>
                        <span class="details-info text-center text-bg-primary"> ${game.platform}</span>
                    </p>
                    <p>
                        <span>Status: </span>
                        <span class="details-info text-center text-bg-danger"> ${game.status}</span>
                    </p>
                    <div class="mb-3">
                        <button type="button" data-game-id="${game.id}" onclick="window.addGameToLibrary(this)" class="btn details-heart-btn fw-bold" title="Add to library">
                            <i class="fa-regular fa-heart me-2"></i><span class="library-btn-label">Add To Library</span>
                        </button>
                        <p id="library-message" class="library-message mt-2 mb-0"></p>
                    </div>
                    <p class="small">${game.description}</p>
                        <a class="btn btn-outline-primary text-white" target="_blank" href="${game.game_url}">Show Game</a>
                        
                </div> `;
    document.querySelector("#details-display").innerHTML = detailsContent;
    this.syncLibraryButton(game.id);
  }
  showLoader() {
    $("#loader").removeClass("d-none").fadeIn(200);
  }

  hideLoader() {
    $("#loader span").fadeOut(500, function () {
      $("#loader").fadeOut(500, function () {
        $("#loader").addClass("d-none");
        $("#loader span").show();
      });
    });
  }
}
