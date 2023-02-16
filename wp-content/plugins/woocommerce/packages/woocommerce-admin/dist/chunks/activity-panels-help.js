(window.__wcAdmin_webpackJsonp=window.__wcAdmin_webpackJsonp||[]).push([[4],{565:function(e,t,o){"use strict";var c=o(0),n=o(6),m=o.n(n),r=o(1),i=o.n(r),a=o(22),s=o(23);o(566);class l extends c.Component{render(){const{className:e,menu:t,subtitle:o,title:n,unreadMessages:r}=this.props,i=m()({"woocommerce-layout__inbox-panel-header":o,"woocommerce-layout__activity-panel-header":!o},e),s=r||0;return Object(c.createElement)("div",{className:i},Object(c.createElement)("div",{className:"woocommerce-layout__inbox-title"},Object(c.createElement)(a.Text,{variant:"title.small",size:"20",lineHeight:"28px"},n),Object(c.createElement)(a.Text,{variant:"button",weight:"600",size:"14",lineHeight:"20px"},s>0&&Object(c.createElement)("span",{className:"woocommerce-layout__inbox-badge"},r))),Object(c.createElement)("div",{className:"woocommerce-layout__inbox-subtitle"},o&&Object(c.createElement)(a.Text,{variant:"body.small",size:"14",lineHeight:"20px"},o)),t&&Object(c.createElement)("div",{className:"woocommerce-layout__activity-panel-header-menu"},t))}}l.propTypes={className:i.a.string,unreadMessages:i.a.number,title:i.a.string.isRequired,subtitle:i.a.string,menu:i.a.shape({type:i.a.oneOf([s.EllipsisMenu])})},t.a=l},566:function(e,t,o){},626:function(e,t,o){"use strict";(function(e,c){var n,m=o(628);n="undefined"!=typeof self?self:"undefined"!=typeof window?window:void 0!==e?e:c;var r=Object(m.a)(n);t.a=r}).call(this,o(80),o(627)(e))},627:function(e,t){e.exports=function(e){if(!e.webpackPolyfill){var t=Object.create(e);t.children||(t.children=[]),Object.defineProperty(t,"loaded",{enumerable:!0,get:function(){return t.l}}),Object.defineProperty(t,"id",{enumerable:!0,get:function(){return t.i}}),Object.defineProperty(t,"exports",{enumerable:!0}),t.webpackPolyfill=1}return t}},628:function(e,t,o){"use strict";function c(e){var t,o=e.Symbol;return"function"==typeof o?o.observable?t=o.observable:(t=o("observable"),o.observable=t):t="@@observable",t}o.d(t,"a",(function(){return c}))},657:function(e,t,o){"use strict";o.r(t),o.d(t,"SETUP_TASK_HELP_ITEMS_FILTER",(function(){return k})),o.d(t,"HelpPanel",(function(){return S}));var c=o(0),n=o(2),m=o(22),r=o(7),i=o(34),a=o(147),s=o(541),l=o(588),u=o(3),p=o(17),d=o(23),_=o(11),h=(o(626),function(){return Math.random().toString(36).substring(7).split("").join(".")});h(),h();function w(){for(var e=arguments.length,t=new Array(e),o=0;o<e;o++)t[o]=arguments[o];return 0===t.length?function(e){return e}:1===t.length?t[0]:t.reduce((function(e,t){return function(){return e(t.apply(void 0,arguments))}}))}var b=o(18),g=o(565),f=o(70),O=o(585);const k="woocommerce_admin_setup_task_help_items";function y(e){const{taskName:t}=e;switch(t){case"products":return[{title:Object(n.__)("Adding and Managing Products",'woocommerce'),link:"https://docs.woocommerce.com/document/managing-products/?utm_source=help_panel"},{title:Object(n.__)("Import products using the CSV Importer and Exporter",'woocommerce'),link:"https://docs.woocommerce.com/document/product-csv-importer-exporter/?utm_source=help_panel"},{title:Object(n.__)("Migrate products using Cart2Cart",'woocommerce'),link:"https://woocommerce.com/products/cart2cart/?utm_source=help_panel"},{title:Object(n.__)("Learn more about setting up products",'woocommerce'),link:"https://docs.woocommerce.com/documentation/plugins/woocommerce/getting-started/setup-products/?utm_source=help_panel"}];case"appearance":return[{title:Object(n.__)("Showcase your products and tailor your shopping experience using Blocks",'woocommerce'),link:"https://docs.woocommerce.com/document/woocommerce-blocks/?utm_source=help_panel"},{title:Object(n.__)("Manage Store Notice, Catalog View and Product Images",'woocommerce'),link:"https://docs.woocommerce.com/document/woocommerce-customizer/?utm_source=help_panel"},{title:Object(n.__)("How to choose and change a theme",'woocommerce'),link:"https://docs.woocommerce.com/document/choose-change-theme/?utm_source=help_panel"}];case"shipping":return function({activePlugins:e,countryCode:t}){const o="US"===t&&!e.includes("woocommerce-services");return[{title:Object(n.__)("Setting up Shipping Zones",'woocommerce'),link:"https://docs.woocommerce.com/document/setting-up-shipping-zones/?utm_source=help_panel"},{title:Object(n.__)("Core Shipping Options",'woocommerce'),link:"https://docs.woocommerce.com/documentation/plugins/woocommerce/getting-started/shipping/core-shipping-options/?utm_source=help_panel"},{title:Object(n.__)("Product Shipping Classes",'woocommerce'),link:"https://docs.woocommerce.com/document/product-shipping-classes/?utm_source=help_panel"},o&&{title:Object(n.__)("WooCommerce Shipping setup and configuration",'woocommerce'),link:"https://docs.woocommerce.com/document/woocommerce-services/#section-3/?utm_source=help_panel"},{title:Object(n.__)("Learn more about configuring your shipping settings",'woocommerce'),link:"https://docs.woocommerce.com/documentation/plugins/woocommerce/getting-started/shipping/?utm_source=help_panel"}].filter(Boolean)}(e);case"tax":return function(e){const{countryCode:t}=e,{automatedTaxSupportedCountries:o=[],taxJarActivated:c}=e.getSetting("onboarding",{}),m=!c&&o.includes(t);return[{title:Object(n.__)("Setting up Taxes in WooCommerce",'woocommerce'),link:"https://docs.woocommerce.com/document/setting-up-taxes-in-woocommerce/?utm_source=help_panel"},m&&{title:Object(n.__)("Automated Tax calculation using WooCommerce Tax",'woocommerce'),link:"https://docs.woocommerce.com/document/woocommerce-services/?utm_source=help_panel#section-10"}].filter(Boolean)}(e);case"payments":return function(e){const{countryCode:t,onboardingStatus:o,profileItems:c}=e,m=e.getPaymentMethods({activePlugins:[],countryCode:t,onboardingStatus:o,options:{},profileItems:c}),r=e=>Boolean(m.find(t=>t.key===e)),i=r("wcpay"),a=r("stripe"),s=r("klarna_checkout"),l=r("klarna_payments"),u=r("paypal"),p=r("square"),d=r("payfast"),_=r("eway");return[{title:Object(n.__)("Which Payment Option is Right for Me?",'woocommerce'),link:"https://docs.woocommerce.com/document/premium-payment-gateway-extensions/?utm_source=help_panel"},i&&{title:Object(n.__)("WooCommerce Payments Start Up Guide",'woocommerce'),link:"https://docs.woocommerce.com/document/payments//?utm_source=help_panel"},i&&{title:Object(n.__)("WooCommerce Payments FAQs",'woocommerce'),link:"https://docs.woocommerce.com/documentation/woocommerce-payments/woocommerce-payments-faqs/?utm_source=help_panel"},a&&{title:Object(n.__)("Stripe Setup and Configuration",'woocommerce'),link:"https://docs.woocommerce.com/document/stripe/?utm_source=help_panel"},u&&{title:Object(n.__)("PayPal Checkout Setup and Configuration",'woocommerce'),link:"https://docs.woocommerce.com/document/2-0/woocommerce-paypal-payments/#section-3"},p&&{title:Object(n.__)("Square - Get started",'woocommerce'),link:"https://docs.woocommerce.com/document/woocommerce-square/?utm_source=help_panel"},s&&{title:Object(n.__)("Klarna - Introduction",'woocommerce'),link:"https://docs.woocommerce.com/document/klarna-checkout/?utm_source=help_panel"},l&&{title:Object(n.__)("Klarna - Introduction",'woocommerce'),link:"https://docs.woocommerce.com/document/klarna-payments/?utm_source=help_panel"},d&&{title:Object(n.__)("PayFast Setup and Configuration",'woocommerce'),link:"https://docs.woocommerce.com/document/payfast-payment-gateway/?utm_source=help_panel"},_&&{title:Object(n.__)("eWAY Setup and Configuration",'woocommerce'),link:"https://docs.woocommerce.com/document/eway/?utm_source=help_panel"},{title:Object(n.__)("Direct Bank Transfer (BACS)",'woocommerce'),link:"https://docs.woocommerce.com/document/bacs/?utm_source=help_panel"},{title:Object(n.__)("Cash on Delivery",'woocommerce'),link:"https://docs.woocommerce.com/document/cash-on-delivery/?utm_source=help_panel"}].filter(Boolean)}(e);default:return[{title:Object(n.__)("Get Support",'woocommerce'),link:"https://woocommerce.com/my-account/create-a-ticket/"},{title:Object(n.__)("Home Screen",'woocommerce'),link:"https://docs.woocommerce.com/document/home-screen"},{title:Object(n.__)("Inbox",'woocommerce'),link:"https://docs.woocommerce.com/document/home-screen/#section-2"},{title:Object(n.__)("Stats Overview",'woocommerce'),link:"https://docs.woocommerce.com/document/home-screen/#section-4"},{title:Object(n.__)("Store Management",'woocommerce'),link:"https://docs.woocommerce.com/document/home-screen/#section-5"},{title:Object(n.__)("Store Setup Checklist",'woocommerce'),link:"https://docs.woocommerce.com/document/woocommerce-setup-wizard/#store-setup-checklist"}]}}function j(e,t){const{taskName:o}=e;t&&e.recordEvent("help_panel_click",{task_name:o||"homescreen",link:t.currentTarget.href})}const S=e=>{const{taskName:t}=e;Object(c.useEffect)(()=>{e.recordEvent("help_panel_open",{task_name:t||"homescreen"})},[t]);const o=function(e){const t=y(e),o={title:Object(n.__)("WooCommerce Docs",'woocommerce'),link:"https://docs.woocommerce.com/?utm_source=help_panel"};t.push(o);const r=Object(i.applyFilters)(k,t,e.taskName,e);let p=Array.isArray(r)?r.filter(e=>e instanceof Object&&e.title&&e.link):[];p.length||(p=[o]);const d=Object(u.partial)(j,e);return p.map(e=>({title:Object(c.createElement)(m.Text,{as:"div",variant:"button",weight:"600",size:"14",lineHeight:"20px"},e.title),before:Object(c.createElement)(a.a,{icon:s.a}),after:Object(c.createElement)(a.a,{icon:l.a}),linkType:"external",target:"_blank",href:e.link,onClick:d}))}(e);return Object(c.createElement)(c.Fragment,null,Object(c.createElement)(g.a,{title:Object(n.__)("Documentation",'woocommerce')}),Object(c.createElement)(d.Section,null,Object(c.createElement)(d.List,{items:o,className:"woocommerce-quick-links__list"})))};S.defaultProps={getPaymentMethods:O.a,getSetting:p.h,recordEvent:b.recordEvent};t.default=w(Object(r.withSelect)(e=>{const{getProfileItems:t,getTasksStatus:o}=e(_.ONBOARDING_STORE_NAME),{getSettings:c}=e(_.SETTINGS_STORE_NAME),{getActivePlugins:n}=e(_.PLUGINS_STORE_NAME),{general:m={}}=c("general"),r=n(),i=o(),a=t();return{activePlugins:r,countryCode:Object(f.b)(m.woocommerce_default_country),onboardingStatus:i,profileItems:a}}))(S)}}]);