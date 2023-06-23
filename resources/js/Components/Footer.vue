<template>
    <div class="footer">
        <div class="footer__container">
            <div class="footer__wrapper">
                <div class="footer__links">
                    <a href="" class="footer__information">О нас</a>
                    <a href="" class="footer__information">
                        Политика конфиденциальности
                    </a>
                    <a href="/" class="footer__information">Все сериалы</a>
                </div>
                <div class="footer__contacts">
                    <a href="" class="footer__socialNetwork">
                        <img
                            src="../../images/vk.png"
                            alt="Вконтакте"
                            class="footer__icon"
                        />
                    </a>
                    <a href="" class="footer__socialNetwork">
                        <img
                            src="../../images/telegram.png"
                            alt="Телеграм"
                            class="footer__icon"
                        />
                    </a>
                    <a href="" class="footer__socialNetwork">
                        <img
                            src="../../images/twitter.png"
                            alt="Твиттер"
                            class="footer__icon"
                        />
                    </a>
                </div>
            </div>
            <div class="footer__wrapper">
                <span class="footer__copyright">
                    &#169; 2023, Лучшие сериалы
                </span>
                <span class="footer__author">
                    Проект
                    <a
                        href="https://github.com/sonechqa"
                        class="footer__authorLink"
                        >Сонечки</a
                    >
                </span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Footer",
};
</script>

<style scoped lang="scss">
.footer {
    background-color: rgb(34, 31, 31);

    &__container {
        width: 1000px;
        margin: auto;
        padding: 50px;
    }

    &__wrapper {
        display: flex;
        justify-content: space-between;

        &:not(:last-child) {
            margin-bottom: 30px;
        }
    }

    &__contacts {
        display: flex;
        flex-direction: column;
    }

    &__links {
        display: flex;
        flex-direction: column;
    }

    &__information {
        color: white;
        text-decoration: none;

        &:not(:last-child) {
            margin-bottom: 20px;
        }
    }

    &__socialNetwork {
        &:not(:last-child) {
            margin-bottom: 5px;
        }
    }

    &__icon {
        width: 28px;
        height: 28px;
    }

    &__copyright,
    &__author,
    &__authorLink {
        color: white;
    }

    &__authorLink {
        text-decoration: underline;
    }
}
</style>
