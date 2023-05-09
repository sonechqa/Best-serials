<template>
    <div class="header">
        <h1 class="header__title">
            <a href="/" class="header__link">Лучшие сериалы</a>
        </h1>
        <form class="header__form">
            <input
                type="text"
                placeholder="Поиск сериалов"
                class="header__input"
            />
            <button type="submit" class="header__button"></button>
        </form>
        <div class="header__profile">
            <a href="/profile">
                <img src="../../images/user.png" alt="" class="header__user" />
            </a>
        </div>
    </div>
</template>

<script>
export default {
    name: "Header",
};
</script>

<style>
.header {
    display: flex;
    justify-content: space-around;
    align-items: center;
    background-color: rgb(34, 31, 31);
}

.header__title {
    font-family: "Roboto", sans-serif;
    font-weight: 300;
    font-style: italic;
}

.header__link {
    text-decoration: none;
    color: white;
}

.header__form {
    display: flex;
    padding: 2px;
    background-color: white;
    border-radius: 5px;
}

.header__input {
    border: none;
    margin: 0;
    padding: 7px;
    color: inherit;
    border: 1px solid transparent;
    border-radius: inherit;
    outline: none;
}

.header__button {
    background-image: url("../../images/loupe.png");
    background-size: 20px;
    background-repeat: no-repeat;
    background-position: center;
    width: 50px;
    cursor: pointer;
    background-color: transparent;
    overflow: hidden;
    padding: 0;
    margin: 0;
    border-radius: inherit;
    border: 1px solid transparent;
}

.header__profile {
    cursor: pointer;
}

.header__user {
    width: 40px;
    height: 40px;
}
</style>
