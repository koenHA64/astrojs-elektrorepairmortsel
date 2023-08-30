/** @type {import('tailwindcss').Config} */
module.exports = {
	content: ['./src/**/*.{astro,html,js,jsx,md,mdx,svelte,ts,tsx,vue}'],
	theme: {
		container: {
		  screens: {
			 sm: "100%",
			 md: "100%",
			 lg: "960px",
			 xl: "1280px",
			 "2xl": "1420px"
		  },
		  center: true
		}
	},
	plugins: [],
}
