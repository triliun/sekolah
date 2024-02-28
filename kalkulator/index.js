const display = document.querySelector(".display");
const buttons = document.querySelectorAll("button");
const specialChars = ["%", "+", "-", "/", "*", "="];
let output = "";

buttons.forEach((button) => {
  button.addEventListener("click", (e) => calculate(e.target.dataset.value));
});

const calculate = (btnValue) => {
  const lastChar = output.charAt(output.length - 1);

  if (isNaN(lastChar) && specialChars.includes(btnValue)) {
    return;
  } 

  if (btnValue === "=" && output !== "") {
    try {
      output = String(eval(output.replace("%", "/100")));
    } catch (error) {
      output = "Error";
    }
  } else if (btnValue === "AC") {
    output = "";
  } else if (btnValue === "DEL") {
    output = output.toString().slice(0, -1);
  } else {
    output += btnValue;
  }

  display.value = output;
};

