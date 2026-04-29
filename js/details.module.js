// الملف دا مخصوص انه يجيب ال api  بتاع تفاصيل الالعاب 

import { Ui } from "./ui.js";
let ui = new Ui();
export class Details {
    constructor() {
        this.closeDetails()
    }
    async getDetails(gameId) {
        ui.showLoader()
        const options = {
            method: 'GET',
            headers: {
                'x-rapidapi-key': 'bcd0861096msh2e3172db7bc7e48p132393jsnaaea4dc2cddc',
                'x-rapidapi-host': 'free-to-play-games-database.p.rapidapi.com'
            }
        };

        const api = await fetch(`https://free-to-play-games-database.p.rapidapi.com/api/game?id=${gameId}`, options);
        const response = await api.json()
        console.log(response);
        ui.displayDetails(response);
        ui.hideLoader()
    }

    closeDetails() {
        $("#close-btn").on("click", function () {
            $("#details").addClass("d-none");
            $("#main-header").removeClass("d-none");
            $("nav").removeClass("d-none");
            $("main").removeClass("d-none");
        })
    }
}