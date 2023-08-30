import { defineConfig } from 'astro/config';

import tailwind from "@astrojs/tailwind";

// https://astro.build/config
export default defineConfig({
  site: "https://jelle-vdp.github.io/",
  base: "/astrojs-elektrorepairmortsel"
  integrations: [tailwind()]
});