add = () => {
  const op = document.querySelector(".add");
  const num1 = parseInt(op.querySelector(".firstNumber").value);
  const num2 = parseInt(op.querySelector(".secondNumber").value);
  op.querySelector(".result-add").innerHTML = num1 + num2;
};

sub = () => {
  const op = document.querySelector(".sub");
  const num1 = parseInt(op.querySelector(".firstNumber").value);
  const num2 = parseInt(op.querySelector(".secondNumber").value);
  op.querySelector(".result-sub").innerHTML = num1 - num2;
};

mul = () => {
  const op = document.querySelector(".multiply");
  const num1 = parseInt(op.querySelector(".firstNumber").value);
  const num2 = parseInt(op.querySelector(".secondNumber").value);
  op.querySelector(".result-mul").innerHTML = num1 * num2;
};

div = () => {
  const op = document.querySelector(".division");
  const num1 = parseInt(op.querySelector(".firstNumber").value);
  const num2 = parseInt(op.querySelector(".secondNumber").value);
  op.querySelector(".result-div").innerHTML = num1 / num2;
};

pow = () => {
  const op = document.querySelector(".pow");
  const num1 = parseInt(op.querySelector(".firstNumber").value);
  const num2 = parseInt(op.querySelector(".secondNumber").value);
  op.querySelector(".result-pow").innerHTML = Math.pow(num1, num2);
};
