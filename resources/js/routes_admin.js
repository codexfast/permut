import Index from './components/admin/index.vue';
import Login from './components/admin/auth/Login.vue';
import Recover from './components/admin/auth/Recover.vue';
import ResetPassword from './components/admin/auth/ResetPassword.vue';
import VerifyEmail from './components/admin/auth/VerifyEmail.vue';
import NotFound from './components/NotFound.vue';



const progress = {
    func: [
        { call: 'color', modifier: 'temp', argument: '#238238' },
        { call: 'fail', modifier: 'temp', argument: '#6e0000' },
        { call: 'location', modifier: 'temp', argument: 'top' },
        { call: 'transition', modifier: 'temp', argument: { speed: '1.5s', opacity: '0.6s', termination: 400 } }
    ]
}
const PageName = "Permut"
const MainURL = location.host;
const FacebookURL = 'https://www.facebook.com/permut';
const MainImage = 'http://' + location.host + '/img/placeholder_image.png';
const MainTitle = 'Default';
const MainKeys = 'Permutas';
const MainColor = "#52D18D"
const MainDescription = 'Default';
const MainUserName = "@permut"
const MainLocale = "pt_BR";
const metaHelper = [
    ////
    {
        name: 'theme-color',
        content: MainColor
    },
    {
        name: 'msapplication-navbutton-color',
        content: MainColor
    },
    {
        name: 'apple-mobile-web-app-capable',
        content: 'yes'
    },
    {
        name: 'apple-mobile-web-app-status-bar-style',
        content: MainColor
    },
    {
        property: 'keywords',
        content: MainKeys
    },
    {
        property: 'og:locale',
        content: MainLocale
    },
    {
        property: 'og:type',
        content: 'article'
    },
    {
        property: 'og:site_name',
        content: PageName
    },
    {
        property: 'article:publisher',
        content: FacebookURL
    },
    {
        name: 'twitter:creator',
        content: MainUserName
    },
    {
        name: 'twitter:site',
        content: MainUserName
    },
    {
        name: 'twitter:card',
        content: 'summary_large_image'
    },
    {
        name: 'description',
        content: MainDescription
    },
    {
        property: 'og:description',
        content: MainDescription
    },
    {
        property: 'og:url',
        content: MainURL
    },
    {
        property: 'og:image',
        content: MainImage
    },
    {
        property: 'og:image:secure_url',
        content: MainImage
    },

    {
        name: 'twitter:description',
        content: MainDescription
    },

    {
        name: 'twitter:image',
        content: MainImage
    },
]

export const routes = [
    {
        path: '/admin',
        component: Index,
        meta: {
            requiresAuth: true,
            title: PageName + ' - ' + MainTitle,
            metaTags: [
                ...metaHelper,
                {
                    property: 'og:title',
                    content: PageName + ' - ' + MainTitle,
                },
                {
                    name: 'twitter:title',
                    content: PageName + ' - ' + MainTitle,
                },
            ],
            progress
        }
    },


    {
        path: '/admin/404',
        component: NotFound,
        meta: {
            title: PageName + ' - Página não encontrada',
            metaTags: [
                ...metaHelper,
                {
                    property: 'og:title',
                    content: PageName + " - Página não encontrada"
                },
                {
                    name: 'twitter:title',
                    content: PageName + " - Página não encontrada"
                },
            ],
            progress
        }
    },
    {
        path: '*',
        redirect: '/admin/404',
        meta: {
            progress
        }
    },
    {
        path: '/admin/login',
        component: Login,
        meta: {
            title: PageName + " - Login",
            metaTags: [
                ...metaHelper,
                {
                    property: 'og:title',
                    content: PageName + " - Login"
                },
                {
                    name: 'twitter:title',
                    content: PageName + " - Login"
                },
            ],
            progress
        }
    },


    {
        path: '/admin/reset-password',
        name: 'reset-password',
        component: Recover,
        meta: {
            title: PageName + " - Recuperar conta",
            metaTags: [
                ...metaHelper,
                {
                    property: 'og:title',
                    content: PageName + " - Recuperar conta"
                },
                {
                    name: 'twitter:title',
                    content: PageName + " - Recuperar conta"
                },
            ],
            progress
        }
    },
    {
        path: '/admin/reset-password/:token',
        name: 'reset-password-form',
        component: ResetPassword,
        meta: {
            title: PageName + " - Recuperar conta",
            metaTags: [
                ...metaHelper,
                {
                    property: 'og:title',
                    content: PageName + " - Recuperar conta"
                },
                {
                    name: 'twitter:title',
                    content: PageName + " - Recuperar conta"
                },
            ],
            progress
        }
    },
    {
        path: '/admin/verify-email',
        name: 'verify-email',
        component: VerifyEmail,
        meta: {
            requiresAuth: true,
            title: PageName + ' Verificar e-mail',
            metaTags: [
                ...metaHelper,
                {
                    property: 'og:title',
                    content: PageName + " - Verificar e-mail"
                },
                {
                    name: 'twitter:title',
                    content: PageName + " - Verificar e-mail"
                },
            ],
            progress
        }
    }

];