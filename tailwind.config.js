module.exports = {
  theme: {
    container: {
      center: true,
      padding: "12px"
    },
    colors: {
      black: "#333",
      white: "#fff",
      transparent: "transparent",
      blue: { default: "#4e6ecb" },
      green: { default: "#37c57e", accent: "#149c58" },
      orange: { default: "#ff9a03", accent: "#f79d16" },
      grey: {
        default: "#9a9a9a",
        light: "#d9d8d8",
        lighter: "#f2f2f2",
        lightest: "#f9f9f9"
      }
    },
    screens: {
      tiny: "360px",
      sm: "640px",
      md: "768px",
      lg: "1024px",
      xl: "1230px"
    },
    spacing: {
      "0": "0",
      tiny: "4px",
      "1": "8px",
      "2": "12px",
      "3": "16px",
      "4": "24px",
      "5": "32px",
      "6": "48px"
    },
    fontSize: {
      "2xs": "0.6875rem", // 11px
      xs: "0.75rem", // 12px
      sm: "0.875rem", // 14px
      base: "16px",
      lg: "1.25rem", // 18px
      xl: "1.625rem", // 26px
      "2xl": "2.25rem" // 36px
    },
    fontWeight: {
      light: 300,
      normal: 400,
      semibold: 600,
      bold: 700,
      black: 900
    },
    boxShadow: {
      none: "none",
      default: "-2px 2px 10px 0 rgba(0, 0, 0, 0.1)",
      lg: "0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23)"
    },
    backgroundSize: {
      auto: "auto",
      cover: "cover",
      contain: "contain"
    },
    backgroundPosition: {
      bottom: "bottom",
      center: "center",
      left: "left",
      "left-bottom": "left bottom",
      "left-top": "left top",
      right: "right",
      "right-bottom": "right bottom",
      "right-top": "right top",
      top: "top"
    },
    listStyleType: {
      none: "none",
      disc: "disc",
      decimal: "decimal",
      square: "square",
      roman: "upper-roman"
    },
    borderRadius: {
      none: "0",
      sm: "3px",
      default: "5px",
      lg: "10px",
      full: "9999px"
    },
    lineHeight: {
      none: 1,
      tight: 1.25,
      snug: 1.375,
      normal: 1.5,
      relaxed: 1.725,
      loose: 2
    },
    translate: {
      "-1/2": "-50%"
    },
    zIndex: {
      "0": 0,
      "10": 10,
      "20": 20,
      "30": 30,
      "40": 40,
      "50": 50,
      "60": 60,
      "70": 70,
      "80": 80,
      "90": 90,
      "100": 100,
      auto: "auto"
    }
  },
  variants: {
    display: ["responsive", "hover", "focus", "group-hover"]
  },
  plugins: [],
  corePlugins: {}
};
