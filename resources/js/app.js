import "bootstrap";
import Glide from "@glidejs/glide";
import Cookies from "js-cookie";
import { Variable } from './modules/variables.js';
import { $, $$, create } from './modules/utilities.js';

const api_url = "http://127.0.0.1:8000/api/v1";
const url = "http://127.0.0.1:8000";

/* ==> MAIN SEARCH BOX */
function searchFunctionality(searchField, omniBox) {
    if (searchField.value == "" || searchField.value == null) {
        omniBox.innerHTML = "";
    } else {
        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");
        myHeaders.append("Accept", "application/json");

        var raw = JSON.stringify({
            chapter: searchField.value,
        });

        var requestOptions = {
            method: "POST",
            headers: myHeaders,
            body: raw,
            redirect: "follow",
        };

        fetch(`${Variable.development.api_url}/note/search/chapter`, requestOptions)
            .then((response) => response.json())
            .then((result) => {
                if (result.response) {
                    if (result.response.length > 0) {
                        omniBox.innerHTML = "";
                        for (const item of result.response) {
                            var anchor = create("a");
                            anchor.classList.add("list-group-item");
                            anchor.classList.add("text-dark");
                            anchor.classList.add("fs-15");
                            anchor.href = `${url}/note/category/${item.id}`;
                            anchor.innerText = `${item.chapter}`;
                            omniBox.append(anchor);
                        }
                    } else {
                        omniBox.innerHTML = "";
                        omniBox.innerHTML = `
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                No Notes Found . . .
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `;
                    }
                }
            })
            .catch((error) => console.log("error", error));
    }
}

if (
    $(".mobile-main-navbar-omnibox") &&
    $(".mobile-main-navbar-searchField") &&
    $(".mobile-main-navbar-searchBtn")
) {
    $(".mobile-main-navbar-searchField").addEventListener("keyup", () => {
        searchFunctionality(
            $(".mobile-main-navbar-searchField"),
            $(".mobile-main-navbar-omnibox")
        );
    });
    $(".mobile-main-navbar-searchBtn").addEventListener("click", () => {
        if ($(".mobile-main-navbar-searchField").value) {
            location.href = `${url}/search/${
                $(".mobile-main-navbar-searchField").value
            }`;
        }
    });
}

if (
    $(".desktop-main-navbar-omnibox") &&
    $(".desktop-main-navbar-searchField") &&
    $(".desktop-main-navbar-searchBtn")
) {
    $(".desktop-main-navbar-searchField").addEventListener("keyup", () => {
        searchFunctionality(
            $(".desktop-main-navbar-searchField"),
            $(".desktop-main-navbar-omnibox")
        );
    });
    $(".desktop-main-navbar-searchBtn").addEventListener("click", () => {
        if ($(".desktop-main-navbar-searchField").value) {
            location.href = `${url}/search/${
                $(".desktop-main-navbar-searchField").value
            }`;
        }
    });
}
/* ================== */

/* ==> NOTE SEARCH RESULT */
function noteSearchResult(searchValue, dom) {
    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");
    myHeaders.append("Accept", "application/json");

    var raw = JSON.stringify({
        chapter: searchValue,
    });

    var requestOptions = {
        method: "POST",
        headers: myHeaders,
        body: raw,
        redirect: "follow",
    };

    fetch(`${Variable.development.api_url}/note/search/chapter`, requestOptions)
        .then((response) => response.json())
        .then((result) => {
            if (result.response) {
                if (result.response.length > 0) {
                    for (const item of result.response) {
                        var div = create("div");
                        div.classList.add("col-12");
                        div.classList.add("col-sm-6");
                        div.classList.add("col-md-4");
                        div.classList.add("col-lg-3");
                        div.classList.add("mt-4");
                        div.innerHTML = `
                            <div class="card bg-light rounded-0 border border-3 border-style-dashed">
                                <div class="card-body">
                                    <a class="m-0 text-dark fs-20 text-decoration-none" href="${url}/note/category/${item.id}">${item.chapter}</a>
                                    <div>
                                        <a href="${url}/note/${item.category}" class="badge bg-primary text-decoration-none">${item.category}</a>
                                        <a href="${url}/quiz/category/${item.id}" class="badge bg-secondary text-decoration-none">Mcq</a>
                                    </div>
                                </div>
                            </div>
                        `;
                        dom.append(div);
                    }
                }
            }
        })
        .catch((error) => console.log("error", error));
}

if (location.href.split("/search/").length > 1) {
    var searchValue = location.href.split("/search/")[1];
    searchValue = searchValue.replace("%20", " ");
    noteSearchResult(searchValue, $("#note-search-result"));
}
/* ===================== */

/* ==> SLIDER FUNCTION ONLY */
function quoteSlider() {
    if ($("#quotes")) {
        new Glide("#quotes", {
            type: "carousel",
            autoplay: 12000,
            focusAt: "center",
            startAt: 0,
            perView: 1,
            gap: 10,
        }).mount();
    }
}
quoteSlider();
/* ========================= */

/*  ==> STUDENT AND ADMIN TOKENS */
function tokenForAdmin() {
    if (Cookies.get("token", { domain: url })) {
        var token = Cookies.get("token");
        return token;
    } else {
        Cookies.set("token", "cookies-not-set");
        var token = "cookies-not-set";
        return token;
    }
}
function tokenForStudent() {
    if (Cookies.get("student_token", { domain: url })) {
        var token = Cookies.get("student_token");
        return token;
    } else {
        Cookies.set("student_token", "cookies-not-set");
        var token = "cookies-not-set";
        return token;
    }
}
var adminToken = tokenForAdmin();
var studentToken = tokenForStudent();
/* ============================ */


/* ==> FOR NOTE PAGE */
function singleNote(noteId, mainBody) {
    var requestOptions = {
        method: "GET",
        redirect: "follow",
    };

    fetch(`${Variable.development.api_url}/note/${noteId}`, requestOptions)
        .then((response) => response.json())
        .then((result) => {
            if (result.response) {
                if (result.response == "Blog post not found") {
                    var div = create("div");
                    div.innerHTML = `
                        <p class="text-dark fw-600 m-0 mt-4">No Blog Post Found</p>
                    `;
                    mainBody.append(div);
                }
            }
            if (result.data) {
                $("#breadcrumb").innerHTML = `
                    <div class="container pt-4">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="${url}"
                                        class="text-decoration-none text-dark fw-500">Home</a></li>
                                <li class="breadcrumb-item"><a href="${url}/note"
                                        class="text-decoration-none text-dark fw-500">Note</a></li>
                                <li class="breadcrumb-item"><a href="${url}/note/${result.data.category}"
                                        class="text-decoration-none text-dark fw-500">${result.data.category}</a></li>
                                <li class="breadcrumb-item fw-500 active" aria-current="page">${result.data.subChapter}</li>
                            </ol>
                        </nav>
                    </div>
                `;
                var div = create("div");
                div.innerHTML = `
                    <div class="container pt-4">
                        <a href="${url}/quiz/category/${result.data.id}" class="btn btn-outline-dark rounded-0 border-style-dashed border border-2 fw-600 fs-15">MCQ Exam</a>
                        <a href="${url}/video/category/${result.data.id}" class="btn btn-outline-dark rounded-0 border-style-dashed border border-2 fw-600 fs-15">Videos</a>
                    </div>
                
                    <div class="container pt-3">
                        <h1 class="m-0 text-dark fw-500 fs-30">${result.data.chapter}</h1>
                        <div class="chapter-content mt-4">
                            ${result.data.notes}
                        </div>
                    </div>
                `;
                mainBody.append(div);
            }
        })
        .catch((error) => console.log("error", error));
}

if (location.href.split("/note/category/").length > 1) {
    var blogId = location.href.split("/note/category/")[1];
    singleNote(blogId, $("#single-note-body"));
}

if (location.href.split("/note/category/chapter/").length > 1) {
    var blogId = location.href.split("/note/category/chapter/")[1];
    singleNote(blogId, $("#single-sub-note-body"));
}
/* ================ */

/* ==> FOR QUIZ PAGES */
function getTheQuiz(id, dom, forWhat) {
    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");
    myHeaders.append("Accept", "application/json");

    var requestOptions = {
        method: "GET",
        headers: myHeaders,
        redirect: "follow",
    };

    fetch(`${Variable.development.api_url}/note/${id}`, requestOptions)
        .then((response) => response.json())
        .then((result) => {
            if (result.data) {
                if (result.data.chapter) {
                    var myHeaders = new Headers();
                    myHeaders.append("Content-Type", "application/json");
                    myHeaders.append("Accept", "application/json");

                    if (forWhat == "subchapter") {
                        var raw = JSON.stringify({
                            subChapter: result.data.subChapter,
                            forWhat: forWhat,
                        });
                    } else {
                        var raw = JSON.stringify({
                            chapter: result.data.chapter,
                            forWhat: forWhat,
                        });
                    }

                    var requestOptions = {
                        method: "POST",
                        headers: myHeaders,
                        body: raw,
                        redirect: "follow",
                    };

                    fetch(`${Variable.development.api_url}/quiz/category/chapter`, requestOptions)
                        .then((response) => response.json())
                        .then((result) => {
                            if (result.response) {
                                if (result.response.length > 0) {
                                    console.log(JSON.parse(result.response[0].options)[1]);
                                    var i = 1;
                                    for (const item of result.response) {
                                        const options = JSON.parse(
                                            item.options
                                        );
                                        var quizOption = create("div");
                                        quizOption.innerHTML = "";
                                        quizOption.classList.add(
                                            "quiz-answer-collection"
                                        );
                                        quizOption.setAttribute(
                                            "data-id",
                                            item.id
                                        );
                                        var j = 1;
                                        for (const option of options) {
                                            const quizOption2 = create("div");
                                            quizOption2.innerHTML = `
                                                <div class="form-check m-0 mt-2 d-flex align-items-center">
                                                    <input data-id="${item.id}" data-answer="${j}" class="input-options form-check-input me-2" type="radio" name="question${i}" id="question-${i}-option-${j}">
                                                    <label class="form-check-label fw-500 fs-20" for="question-${i}-option-${j}">
                                                        ${option}
                                                    </label>
                                                </div>
                                            `;
                                            quizOption.append(quizOption2);
                                            j = j + 1;
                                        }
                                        var div = create("div");
                                        div.classList.add("mt-4");
                                        div.setAttribute("data-id", item.id);

                                        div.innerHTML = `
                                            <div class="question">
                                                <h2 class="m-0">${i}. ${item.question}</h2>
                                            </div>
                                        `;
                                        dom.append(div);
                                        dom.append(quizOption);
                                        i = i + 1;
                                    }
                                    var totalQuestion = result.response.length;
                                    $("#quiz-submit-btn").addEventListener(
                                        "click",
                                        () => {
                                            var reporter = [];
                                            for (const input of $$(
                                                ".input-options"
                                            )) {
                                                if (input.checked) {
                                                    reporter.push({
                                                        question:
                                                            input.getAttribute(
                                                                "data-id"
                                                            ),
                                                        answer: input.getAttribute(
                                                            "data-answer"
                                                        ),
                                                    });
                                                }
                                            }
                                            
                                            // Send the result

                                            var myHeaders = new Headers();
                                            myHeaders.append(
                                                "Content-Type",
                                                "application/json"
                                            );
                                            myHeaders.append(
                                                "Accept",
                                                "application/json"
                                            );

                                            if (studentToken.length == 255) {
                                                var raw = JSON.stringify({
                                                    answerSheet: reporter,
                                                    totalQuestion:
                                                        totalQuestion,
                                                    order: "save",
                                                    token: studentToken,
                                                });
                                            } else {
                                                var raw = JSON.stringify({
                                                    answerSheet: reporter,
                                                    totalQuestion:
                                                        totalQuestion,
                                                    order: "no-save",
                                                });
                                            }

                                            var requestOptions = {
                                                method: "POST",
                                                headers: myHeaders,
                                                body: raw,
                                                redirect: "follow",
                                            };

                                            fetch(
                                                `${Variable.development.api_url}/quiz/check/quiz-answer`,
                                                requestOptions
                                            )
                                                .then((response) =>
                                                    response.json()
                                                )
                                                .then((result) => {
                                                    console.log(result);
                                                    if (result.response) {
                                                        if (
                                                            result.response
                                                                .answerSheet ==
                                                            "The answer sheet field is required."
                                                        ) {
                                                            console.log(
                                                                "Answer Sheet Field Required"
                                                            );
                                                        }
                                                        else {
                                                            $(
                                                                "#quiz-report-card"
                                                            ).innerHTML = "";
                                                            $(
                                                                "#quiz-report-card"
                                                            ).innerHTML = `
                                                                <div class="container">
                                                                    <div class="card rounded-0 bg-light border border-style-dashed border-3">
                                                                        <div class="card-body">
                                                                            <h3 class="text-dark fs-20 m-0 fw-600">Showing Test Result</h3>
                                                                            <p class="m-0 text-dark fs-20 fw-500 fs-15 mt-2">Number of questions asked : <span class="badge bg-secondary">${
                                                                                result
                                                                                    .response
                                                                                    .total
                                                                            }</span></p>
                                                                            <p class="m-0 text-dark fs-20 fw-500 fs-15 mt-2">Number of correct answers : <span class="badge bg-primary">${
                                                                                result
                                                                                    .response
                                                                                    .correct
                                                                            }</span></p>
                                                                            <p class="m-0 text-dark fs-20 fw-500 fs-15 mt-2">Incorrect Answers : <span class="badge bg-danger">${
                                                                                result
                                                                                    .response
                                                                                    .total -
                                                                                result
                                                                                    .response
                                                                                    .correct
                                                                            }</span></p>
                                                                            <p class="m-0 text-dark fs-20 fw-500 fs-15 mt-2">Overall Result : <span class="badge bg-primary">${
                                                                                result
                                                                                    .response
                                                                                    .correct
                                                                            } / ${
                                                                result.response
                                                                    .total
                                                            }</span></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            `;
                                                        }
                                                    }
                                                })
                                                .catch((error) =>
                                                    console.log("error", error)
                                                );
                                        }
                                    );
                                } else {
                                    $("#quiz-submit-btn").classList.add(
                                        "d-none"
                                    );
                                    $("#quiz-report-card").innerHTML = "";
                                    $("#quiz-report-card").innerHTML = `
                                        <div class="container">
                                            <h2 class="text-dark fs-30 m-0">There is no MCQ question added for this chapter</h2>
                                        </div>
                                    `;
                                }
                            }
                        })
                        .catch((error) => console.log("error", error));
                } else {
                    console.log("Not Found");
                }
            }
        })
        .catch((error) => console.log("error", error));
}

if (location.href.split("/quiz/category/").length > 1) {
    const id = location.href.split("/quiz/category/")[1];
    getTheQuiz(id, $("#quiz-page-body"), "chapter");
}

if (location.href.split("/quiz/category/chapter/").length > 1) {
    const id = location.href.split("/quiz/category/chapter/")[1];
    getTheQuiz(id, $("#sub-quiz-page-body"), "subchapter");
}
/* ================= */

function login(email, emailMsg, password, passwordMsg, halfUrl, redirectUrl) {
    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");

    var raw = JSON.stringify({
        email: email.value,
        password: password.value,
    });

    var requestOptions = {
        method: "POST",
        headers: myHeaders,
        body: raw,
        redirect: "follow",
    };

    fetch(`${Variable.development.api_url}/${halfUrl}`, requestOptions)
        .then((response) => response.json())
        .then((result) => {
            if (result.message) {
                if (result.message == "Incorrect password") {
                    emailMsg.innerText =
                        "The email or password does not match with eachother.";
                    email.classList.add("border-danger");
                    passwordMsg.innerText =
                        "The email or password does not match with eachother.";
                    password.classList.add("border-danger");
                }
            }
            if (result.response.email == "The email field is required.") {
                emailMsg.innerText = "The email field is required.";
                email.classList.add("border-danger");
            } else if (
                result.response.email ==
                "The email must be a valid email address."
            ) {
                emailMsg.innerText = "The email must be a valid email address.";
                email.classList.add("border-danger");
            }
            if (result.response.password == "The password field is required.") {
                passwordMsg.innerText = "The password field is required.";
                password.classList.add("border-danger");
            }
            if (result.message == "Student record updated successfully") {
                location.href = `${url}/${redirectUrl}`;
            }

            if (result.response.token) {
                if (result.response.token.length >= 100) {
                    if (halfUrl == "student/login") {
                        Cookies.set("student_token", result.response.token, {
                            expires: 7,
                        });
                    } else {
                        Cookies.set("token", result.response.token, {
                            expires: 7,
                        });
                    }
                    location.href = `${url}/${redirectUrl}`;
                }
            }
        })
        .catch((error) => console.log("error", error));

    email.addEventListener("keyup", () => {
        email.classList.remove("border-danger");
        emailMsg.innerText = "";
    });

    password.addEventListener("keyup", () => {
        password.classList.remove("border-danger");
        passwordMsg.innerText = "";
    });
}

function signup(
    firstName,
    firstNameMsg,
    lastName,
    lastNameMsg,
    email,
    emailMsg,
    password,
    passwordMsg,
    passwordConfirmation,
    passwordConfirmationMsg
) {
    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");
    myHeaders.append("Accept", "application/json");

    var raw = JSON.stringify({
        first_name: firstName.value,
        last_name: lastName.value,
        password: password.value,
        password_confirmation: passwordConfirmation.value,
        email: email.value,
    });

    var requestOptions = {
        method: "POST",
        headers: myHeaders,
        body: raw,
        redirect: "follow",
    };

    fetch("http://127.0.0.1:8000/api/v1/student", requestOptions)
        .then((response) => response.json())
        .then((result) => {
            if (result.response) {
                if (result.response.message) {
                    if (result.response.message == "New student added") {
                        Cookies.set("student_token", result.response.token);
                        location.href = `${url}/dashboard`;
                    }
                }
                if (result.response.email == "The email field is required.") {
                    emailMsg.innerText = "The email field is required.";
                    email.classList.add("border-danger");
                } else if (
                    result.response.email ==
                    "The email must be a valid email address."
                ) {
                    emailMsg.innerText =
                        "The email must be a valid email address.";
                    email.classList.add("border-danger");
                } else if (
                    result.response.email == "The email has already been taken."
                ) {
                    emailMsg.innerText = "The email has already been taken.";
                    email.classList.add("border-danger");
                }
                if (
                    result.response.first_name ==
                    "The first name field is required."
                ) {
                    firstNameMsg.innerText =
                        "The first name field is required.";
                    firstName.classList.add("border-danger");
                }
                if (
                    result.response.last_name ==
                    "The last name field is required."
                ) {
                    lastNameMsg.innerText = "The last name field is required.";
                    lastName.classList.add("border-danger");
                }
                if (
                    result.response.password ==
                    "The password field is required."
                ) {
                    passwordMsg.innerText = "The password field is required.";
                    password.classList.add("border-danger");
                }
                if (
                    result.response.password ==
                    "The password confirmation does not match."
                ) {
                    passwordMsg.innerText =
                        "The password confirmation does not match.";
                    password.classList.add("border-danger");

                    passwordConfirmationMsg.innerText =
                        "The password confirmation does not match.";
                    passwordConfirmation.classList.add("border-danger");
                }
            }
        })
        .catch((error) => console.log("error", error));

    firstName.addEventListener("keyup", () => {
        firstName.classList.remove("border-danger");
        firstNameMsg.innerText = "";
    });

    lastName.addEventListener("keyup", () => {
        lastName.classList.remove("border-danger");
        lastNameMsg.innerText = "";
    });

    email.addEventListener("keyup", () => {
        email.classList.remove("border-danger");
        emailMsg.innerText = "";
    });

    password.addEventListener("keyup", () => {
        password.classList.remove("border-danger");
        passwordMsg.innerText = "";
    });

    passwordConfirmation.addEventListener("keyup", () => {
        passwordConfirmation.classList.remove("border-danger");
        passwordConfirmationMsg.innerText = "";
    });
}

function changePassword(
    token,
    newPassword,
    newPasswordMsg,
    confirmPassword,
    confirmPasswordMsg,
    halfUrl,
    redirectUrl
) {
    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");

    var raw = JSON.stringify({
        token: token,
        new_password: newPassword.value,
        new_password_confirmation: confirmPassword.value,
    });

    var requestOptions = {
        method: "POST",
        headers: myHeaders,
        body: raw,
        redirect: "follow",
    };

    fetch(`${Variable.development.api_url}/${halfUrl}`, requestOptions)
        .then((response) => response.json())
        .then((result) => {
            console.log(result);
            if (result.response.token) {
                if (
                    result.response.token ==
                    "The token must be at least 100 characters."
                ) {
                    location.href = `${url}/${redirectUrl}`;
                }
            }
            if (
                result.response.new_password ==
                "The new password field is required."
            ) {
                newPasswordMsg.innerText =
                    "The new password field is required.";
                newPassword.classList.add("border-danger");
            }
            if (
                result.response.new_password ==
                "The new password confirmation does not match."
            ) {
                newPasswordMsg.innerText =
                    "The new password and confirm password does not match.";
                newPassword.classList.add("border-danger");
                confirmPasswordMsg.innerText =
                    "The new password and confirm password does not match.";
                confirmPassword.classList.add("border-danger");
            }
            if (result.message == "Student record updated successfully") {
                Cookies.set("token", "remove-set-token", { expires: 7 });
                location.href = `${url}/${redirectUrl}`;
            }
        })
        .catch((error) => console.log("error", error));

    newPassword.addEventListener("keyup", () => {
        newPassword.classList.remove("border-danger");
        newPasswordMsg.innerText = "";
    });

    confirmPassword.addEventListener("keyup", () => {
        confirmPassword.classList.remove("border-danger");
        confirmPasswordMsg.innerText = "";
    });
}

if ($("#student-change-pwd-btn")) {
    $("#student-change-pwd-btn").addEventListener("click", () => {
        changePassword(
            studentToken,
            $("#newPasswordField"),
            $("#newPasswordField-msg"),
            $("#passwordConfirmationField"),
            $("#passwordConfirmationField-msg"),
            "student/new-password",
            "login"
        );
    });
}

if ($("#studentResetPasswordBtn")) {
    if (location.href.split("/change-password?token=").length > 1) {
        var urlToken = location.href.split("/change-password?token=")[1];
        $("#studentResetPasswordBtn").addEventListener("click", () => {
            changePassword(
                urlToken,
                $("#newPasswordField"),
                $("#newPasswordField-msg"),
                $("#passwordConfirmationField"),
                $("#passwordConfirmationField-msg"),
                "student/new-password",
                "login"
            );
        });
    }
}

if ($("#adminResetPasswordBtn")) {
    if (location.href.split("/change-password?token=").length > 1) {
        var urlToken = location.href.split("/admin/change-password?token=")[1];
        $("#adminResetPasswordBtn").addEventListener("click", () => {
            changePassword(
                urlToken,
                $("#newPasswordField"),
                $("#newPasswordField-msg"),
                $("#passwordConfirmationField"),
                $("#passwordConfirmationField-msg"),
                "admin/new-password",
                "admin/login"
            );
        });
    }
}

function forgotPassword(dom, email, emailMsg, halfUrl, redirectUrl) {
    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");
    myHeaders.append("Accept", "application/json");

    var raw = JSON.stringify({
        email: email.value,
    });

    var requestOptions = {
        method: "POST",
        headers: myHeaders,
        body: raw,
        redirect: "follow",
    };

    fetch(`${Variable.development.api_url}/${halfUrl}`, requestOptions)
        .then((response) => response.json())
        .then((result) => {
            if (result.response) {
                if (result.response == "Sending reset link") {
                    emailMsg.innerText = "Reset link is being sent . . .";
                    email.classList.add("border-primary");
                    emailMsg.classList.remove("text-danger");
                    emailMsg.classList.add("text-primary");
                }
                if (result.response.email == "The email field is required.") {
                    emailMsg.innerText = "The email field is required.";
                    email.classList.add("border-danger");
                } else if (result.response == "Invalid email") {
                    emailMsg.innerText =
                        "The email must be a valid email address.";
                    email.classList.add("border-danger");
                } else if (
                    result.response.email ==
                    "The email must be a valid email address."
                ) {
                    emailMsg.innerText =
                        "The email must be a valid email address.";
                    email.classList.add("border-danger");
                }
            }
        })
        .catch((error) => console.log("error", error));

    email.addEventListener("keyup", () => {
        emailMsg.innerText = "";
        email.classList.remove("border-danger");
    });
}

function showReportCards(dom, token) {
    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");
    myHeaders.append("Accept", "application/json");

    var raw = JSON.stringify({
        token: token,
    });

    var requestOptions = {
        method: "POST",
        headers: myHeaders,
        body: raw,
        redirect: "follow",
    };

    fetch(`${Variable.development.api_url}/student-report/student`, requestOptions)
        .then((response) => response.json())
        .then((result) => {
            console.log(result);
            if (result.response) {
                if (
                    result.response.token ==
                    "The token must be at least 100 characters."
                ) {
                    console.log("Invalid Token : showReportCards()");
                } else {
                    if (result.response.data.length > 0) {
                        dom.innerHTML = "";
                        for (const report of result.response.data) {
                            var div = create("div");
                            div.classList.add("col-12");
                            div.classList.add("col-md-6");
                            div.classList.add("mt-3");
                            div.innerHTML = `
                            <div class="card rounded-0 bg-light border border-style-dashed border-3">
                                <div class="card-body">
                                    <h3 class="text-dark fs-20 m-0 fw-600">Showing Test Result</h3>
                                    <p class="m-0 text-dark fs-20 fw-500 fs-15 mt-2">Number of questions asked : <span
                                            class="badge bg-secondary">${
                                                report.total_question
                                            }</span></p>
                                    <p class="m-0 text-dark fs-20 fw-500 fs-15 mt-2">Number of correct answers : <span
                                            class="badge bg-primary">${
                                                report.correct_answer_count
                                            }</span></p>
                                    <p class="m-0 text-dark fs-20 fw-500 fs-15 mt-2">Incorrect Answers : <span
                                            class="badge bg-danger">${
                                                report.total_question -
                                                report.correct_answer_count
                                            }</span></p>
                                    <p class="m-0 text-dark fs-20 fw-500 fs-15 mt-2">Overall Result : <span
                                            class="badge bg-primary">${
                                                report.correct_answer_count
                                            } / ${
                                report.total_question
                            }</span></p>
                                </div>
                            </div>
                          `;
                            dom.append(div);
                        }
                    } else {
                        dom.innerHTML = `
                        <h3 class="text-dark fs-20">You have yet to taken any mcq exam</h3>
                      `;
                    }
                }
            }
        })
        .catch((error) => console.log("error", error));
}

// if (location.href == `${url}/dashboard`) {
//     showReportCards($("#show-student-report"), studentToken);
// }

if ($("#student-forgot-password-btn")) {
    $("#student-forgot-password-btn").addEventListener("click", () => {
        forgotPassword(
            $("#student-forgot-password-btn"),
            $("#emailField"),
            $("#emailField-msg"),
            "student/forgot-password",
            "login"
        );
    });
}

if ($("#admin-forgot-password-btn")) {
    $("#admin-forgot-password-btn").addEventListener("click", () => {
        forgotPassword(
            $("#admin-forgot-password-btn"),
            $("#emailField"),
            $("#emailField-msg"),
            "admin/forgot-password",
            "admin/login"
        );
    });
}

if ($("#admin-forgot-password-btn")) {
    $("#admin-forgot-password-btn").addEventListener("click", () => {
        forgotPassword(
            $("#student-forgot-password-btn"),
            $("#emailField"),
            $("#emailField-msg"),
            "admin/forgot-password",
            "admin/login"
        );
    });
}

// if ($("#newAdminPasswordField") && $("#passwordAdminConfirmationField")) {
//     $("#adminChangePasswordBtn").addEventListener("click", () => {
//         changePassword(
//             adminToken,
//             $("#newAdminPasswordField"),
//             $("#newAdminPasswordField-msg"),
//             $("#passwordAdminConfirmationField"),
//             $("#passwordAdminConfirmationField-msg"),
//             "admin/new-password",
//             "admin/login"
//         );
//     });
// }

if ($("#emailAdminField") && $("#passwordAdminField")) {
    $("#adminLoginBtn").addEventListener("click", () => {
        login(
            $("#emailAdminField"),
            $("#emailAdminField-msg"),
            $("#passwordAdminField"),
            $("#passwordAdminField-msg"),
            "admin/login",
            "admin/dashboard"
        );
    });
}

if ($("#emailStudentField") && $("#passwordStudentField")) {
    $("#studentLoginBtn").addEventListener("click", () => {
        login(
            $("#emailStudentField"),
            $("#emailStudentField-msg"),
            $("#passwordStudentField"),
            $("#passwordStudentField-msg"),
            "student/login",
            "dashboard"
        );
    });
}

if ($("#signup-student-btn")) {
    $("#signup-student-btn").addEventListener("click", () => {
        signup(
            $("#firstNameField"),
            $("#firstNameField-msg"),
            $("#lastNameField"),
            $("#lastNameField-msg"),
            $("#emailField"),
            $("#emailField-msg"),
            $("#passwordField"),
            $("#passwordField-msg"),
            $("#passwordConfirmationField"),
            $("#passwordConfirmationField-msg")
        );
    });
}

/* ==> NOTE CATEGORY PAGE */
function noteCategoryPage(category, order, mainBody) {
    if (mainBody) {
        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

        var raw = JSON.stringify({
            category: category,
            order: order,
        });

        $("#current-tab").innerText = category;

        var requestOptions = {
            method: "POST",
            headers: myHeaders,
            body: raw,
            redirect: "follow",
        };

        fetch(`${Variable.development.api_url}/note/category`, requestOptions)
            .then((response) => response.json())
            .then((result) => {
                if (result.response) {
                    if (result.response == "Blog post not found") {
                        var div = create("div");
                        div.innerHTML = `
                            <p class="text-dark fw-600 m-0 mt-4">No Note Found</p>
                        `;
                        mainBody.append(div);
                    } else {
                        if (result.response.data.length > 0) {
                            for (const item of result.response.data) {
                                console.log(item);
                                var div = create("div");
                                let date = new Date(item.created_at)
                                    .toString()
                                    .split(" ");
                                div.classList.add("col-12");
                                div.classList.add("col-md-6");
                                div.classList.add("col-lg-4");
                                div.classList.add("col-xl-3");
                                div.classList.add("my-4");
                                div.innerHTML = `
                                    <div class="card bg-light border border-style-dashed border-3 p-1 rounded-0">
                                        <div class="card-body">
                                            <a href="${url}/note/category/${item.id}" class="m-0 text-dark fs-20 text-decoration-none">${item.chapter}</a>
                                            <div>
                                                <span class="badge bg-primary">${item.category}</span>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                mainBody.append(div);
                            }
                        }
                    }
                }
            })
            .catch((error) => console.log("error", error));
    }
}
if (location.href.split("/note/").length > 1) {
    var grabCategory = location.href.split("/note/")[1].split("/");
    grabCategory = location.href.split("/note/")[1];
    noteCategoryPage(grabCategory, "DESC", $("#note-category-body"));
}

/* ==> ALL BLOG RELATED FUNCTION */
function blogCategoryPage(category, order, mainBody) {
    if (mainBody) {
        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

        var raw = JSON.stringify({
            category: category,
            order: order,
        });

        $("#current-tab").innerText = category;

        var requestOptions = {
            method: "POST",
            headers: myHeaders,
            body: raw,
            redirect: "follow",
        };

        fetch(`${Variable.development.api_url}/blog/filter/post`, requestOptions)
            .then((response) => response.json())
            .then((result) => {
                if (result.response) {
                    if (result.response == "Blog post not found") {
                        var div = create("div");
                        div.innerHTML = `
                            <p class="text-dark fw-600 m-0 mt-4">No Blog Post Found</p>
                        `;
                        mainBody.append(div);
                    } else {
                        if (result.response.data.length > 0) {
                            for (const item of result.response.data) {
                                var div = create("div");
                                let date = new Date(item.created_at)
                                    .toString()
                                    .split(" ");
                                div.classList.add("col-12");
                                div.classList.add("col-md-6");
                                div.classList.add("col-lg-4");
                                div.classList.add("col-xl-3");
                                div.classList.add("my-4");
                                div.innerHTML = `
                            <div class="card bg-light border border-style-dashed border-3 p-1 rounded-0">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <img class="card-img-top rounded-0 w-100 h-100"
                                        src="${item["thumbnail"]}" alt="blog thumbnail" />
                                </div>
                                <div class="col-12 col-sm-6 col-lg-12">
                                    <div class="card-body p-0 p-2">
                                        <h3 class="fw-600 fs-25 text-dark text-ellipsis w-100 m-0">${item["title"]}</h3>
                                        <div class="d-flex w-100 justify-content-between align-items-center">
                                            <div>
                                                <p class="m-0 fs-10 fw-500 text-dark">
                                                    ${date[2]} &nbsp;${date[1]} &nbsp;${date[3]}
                                                </p>
                                            </div>
                                            <div>
                                                <a href="{{ env('APP_URL') }}/blog/${item["category"]}"
                                                    class="btn btn-sm btn-secondary rounded-0 p-0 px-2 mb-2">${item["category"]}</a>
                                            </div>
                                        </div>
                                        <p class="fw-500 fs-15 text-dark text-ellipsis w-100 m-0">
                                            ${item["description"]}
                                        </p>
                                        <a href="${url}/blog/category/${item["id"]}" class="btn mt-1 btn-sm rounded-0 btn-outline-primary"
                                            alt="read more">Read
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            `;
                                mainBody.append(div);
                            }
                        }
                    }
                }
            })
            .catch((error) => console.log("error", error));
    }
}

function latestBlogPost(category, order, mainBody) {
    if (mainBody) {
        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

        var raw = JSON.stringify({
            category: category,
            order: order,
        });

        var requestOptions = {
            method: "POST",
            headers: myHeaders,
            body: raw,
            redirect: "follow",
        };

        fetch(`${Variable.development.api_url}/blog/filter/post`, requestOptions)
            .then((response) => response.json())
            .then((result) => {
                if (result.response) {
                    if (result.response == "Blog post not found") {
                        var div = create("div");
                        div.innerHTML = `
                        <p class="text-dark fw-600 m-0 mt-4">No Blog Post Found</p>
                    `;
                        mainBody.append(div);
                    } else {
                        if (result.response.data.length > 0) {
                            var breakpoint = 0;
                            for (const item of result.response.data) {
                                breakpoint = breakpoint + 1;
                                var div = create("div");
                                let date = new Date(item.created_at)
                                    .toString()
                                    .split(" ");
                                div.classList.add("col-12");
                                div.classList.add("col-md-6");
                                div.classList.add("col-lg-4");
                                div.classList.add("col-xl-3");
                                div.classList.add("my-4");
                                div.innerHTML = `
                                    <div class="card bg-light border border-style-dashed border-3 p-1 rounded-0">
                                        <div class="row">
                                            <div class="col-12 col-sm-6 col-lg-12">
                                                <img class="card-img-top rounded-0 w-100 h-100"
                                                    src="${item["thumbnail"]}" alt="blog thumbnail" />
                                            </div>
                                            <div class="col-12 col-sm-6 col-lg-12">
                                                <div class="card-body p-0 p-2">
                                                    <h3 class="fw-600 fs-25 text-dark text-ellipsis w-100 m-0">${item["title"]}</h3>
                                                    <div class="d-flex w-100 justify-content-between align-items-center">
                                                        <div>
                                                            <p class="m-0 fs-10 fw-500 text-dark">
                                                                ${date[2]} &nbsp;${date[1]} &nbsp;${date[3]}
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <a href="${url}/blog/${item["category"]}"
                                                                class="btn btn-sm btn-secondary rounded-0 p-0 px-2 mb-2">${item["category"]}</a>
                                                        </div>
                                                    </div>
                                                    <p class="fw-500 fs-15 text-dark text-ellipsis w-100 m-0">
                                                        ${item["description"]}
                                                    </p>
                                                    <a href="${url}/blog/category/${item["id"]}" class="btn mt-1 btn-sm rounded-0 btn-outline-primary"
                                                        alt="read more">Read
                                                        More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                mainBody.append(div);
                                if (breakpoint > 3) {
                                    break;
                                }
                            }
                        }
                    }
                }
            })
            .catch((error) => console.log("error", error));
    }
}

function singlePost(blogId, mainBody) {
    var requestOptions = {
        method: "GET",
        redirect: "follow",
    };

    fetch(`${Variable.development.api_url}/blog/${blogId}`, requestOptions)
        .then((response) => response.json())
        .then((result) => {
            if (result.response) {
                if (result.response == "Blog post not found") {
                    var div = create("div");
                    div.innerHTML = `
                        <p class="text-dark fw-600 m-0 mt-4">No Blog Post Found</p>
                    `;
                    mainBody.append(div);
                }
            }
            if (result.data) {
                $("#breadcrumb").innerHTML = `
                    <div class="container pt-4">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="${url}"
                                        class="text-decoration-none text-dark fw-500">Home</a></li>
                                <li class="breadcrumb-item"><a href="${url}}/blog"
                                        class="text-decoration-none text-dark fw-500">Blog</a></li>
                                <li class="breadcrumb-item"><a href="${url}/blog/${result.data.category}"
                                        class="text-decoration-none text-dark fw-500">${result.data.category}</a></li>
                                <li class="breadcrumb-item fw-500 active" aria-current="page">${result.data.title}</li>
                            </ol>
                        </nav>
                    </div>
                `;
                var div = create("div");
                div.innerHTML = `
                    <h1 class="fs-40 text-dark fw-600 m-0 mt-5 mb-3">${result.data.title}</h1>
                    <div class="d-flex w-100 align-items-center">
                        <div>
                            <p class="m-0 me-3 mb-2 fs-15 fw-500 text-dark">25 JUN 2020</p>
                        </div>
                        <div>
                            <a href="${url}/blog/${result.data.category}"
                                class="btn btn-sm btn-secondary rounded-0 p-0 px-2 mb-2">${result.data.category}</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p class="fs-20">
                            ${result.data.description}
                        </p>
                    </div>
                    <hr class="mt-4">
                    <a href="${url}/blog" class="text-decoration-none text-dark fw-500 fs-15">Go To Blog Page</a>
                `;
                mainBody.append(div);
            }
        })
        .catch((error) => console.log("error", error));
}

if (location.href.split("/blog/category/").length > 1) {
    var blogId = location.href.split("/blog/category/")[1];
    singlePost(blogId, $("#single-blog-post-body"));
}
if (location.href.split("/blog/").length > 1) {
    var grabCategory = location.href.split("/blog/")[1].split("/");
    grabCategory = location.href.split("/blog/")[1];
    blogCategoryPage(grabCategory, "DESC", $("#blog-category-body"));
}
latestBlogPost("all", "DESC", $("#latest-blog-post"));
/* ============================= */

/* ==> LOGIN AND LOGOUT HANDLERS */
function switchButton(
    token,
    buttonHolder,
    order,
    redirectUrl,
    halfUrl,
    dashUrl
) {
    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");

    var raw = JSON.stringify({
        token: token,
        checkOrder: order,
    });

    var requestOptions = {
        method: "POST",
        headers: myHeaders,
        body: raw,
        redirect: "follow",
    };

    fetch(`${Variable.development.api_url}/${halfUrl}`, requestOptions)
        .then((response) => response.json())
        .then((result) => {
            if (result.response) {
                if (result.response == "valid") {
                    buttonHolder.forEach((btn) => {
                        btn.innerHTML = `
                        <div class="btn-group"> 
                        <button data-order="${order}" class="logout-btn btn btn-outline-danger rounded-0 p-1 fs-15 px-2 me-2">Logout</button>
                        <a href="${url}/${dashUrl}" class="btn btn-outline-dark rounded-0 p-1 fs-15 px-2">Dashboard</a>
                        </div>
                        `;
                    });
                } else {
                    buttonHolder.forEach((btn) => {
                        btn.innerHTML = `
                        <a href="${url}/${redirectUrl}" class="btn btn-outline-dark rounded-0 p-1 fs-15 px-2">Login</a>
                        `;
                    });
                }
            }
            if ($(".logout-btn")) {
                $$(".logout-btn").forEach((logout) => {
                    logout.addEventListener("click", (e) => {
                        if (e.target.getAttribute("data-order")) {
                            if (
                                e.target.getAttribute("data-order") ==
                                "check-admin"
                            ) {
                                Cookies.set("token", "just-log-out", {
                                    expires: 7,
                                });
                                location.href = `${url}/${redirectUrl}`;
                            } else {
                                // for student clear student_token
                                Cookies.set("student_token", "just-log-out", {
                                    expires: 7,
                                });
                                location.href = `${url}/${redirectUrl}`;
                            }
                        }
                    });
                });
            }
        })
        .catch((error) => console.log("error", error));
}
if ($(".admin-login-logout-btn")) {
    var adminToken = tokenForAdmin();
    switchButton(
        adminToken,
        $$(".admin-login-logout-btn"),
        "check-admin",
        "admin/login",
        "admin/new-password",
        "admin/dashboard"
    );
}
if ($(".student-login-logout-btn")) {
    console.log("Hello");
    var studentToken = tokenForStudent();
    switchButton(
        studentToken,
        $$(".student-login-logout-btn"),
        "check-student",
        "login",
        "student/new-password",
        "dashboard"
    );
}
/* ============================= */

