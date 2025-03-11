import docsearch from "@docsearch/js";

docsearch({
    container: "#docsearch",
    appId: import.meta.env.VITE_ALGOLIA_APP_ID,
    apiKey: import.meta.env.VITE_ALGOLIA_API_KEY,
    indexName: import.meta.env.VITE_ALGOLIA_INDEX,
});
