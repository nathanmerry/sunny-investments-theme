module.exports = {
  plugins: [
    require("tailwindcss"),
    require("autoprefixer")({
      grid: "autoplace"
    }),
    require("@fullhuman/postcss-purgecss")({
      content: ["./*.php", "./src/**/*.php", "./src/**/*.blade.php"],
      defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || []
    }),
    require("cssnano")({
      preset: "default"
    })
  ]
};
