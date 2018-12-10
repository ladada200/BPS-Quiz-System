<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/questionGenerator.js" type="text/javascript"></script>
    </head>
    <body>
        <div>

            <ul id="questionList">
              <li id="0" style="width: 300px;">
                <div>
                  <table>
                    <tr>
                      <td>
                        Question:
                      </td>
                      <td>
                        <input type="text" id="0" />
                      </td>
                    </tr>
                    <tr>
                      <td valign="top">
                        Choices:
                      </td>
                      <td>
                          <div id="choices">
                              <div id="0"><input type="text" id="0" /><button type="button" class="more">+</button><button type="button" class="less">-</button></div>
                          </div>
                      </td>
                    </tr>
                    <tr>
                      <td valign="top">
                        tags:
                      </td>
                      <td id="tags">
                        <input type="text" id="0" /><button type="button" class="more">+</button><button type="button" class="less">-</button>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Answer:
                      </td>
                      <td>
                        <select>
                        </select>
                      </td>
                    </tr>
                  </table>
                </div>
                <div style="text-align: right">
                  <button type="button" class="add" id="0">Add Question</button> <button type="button" class="remove" id="0">Remove</button>
                </div>
              </li>
            </ul>
        </div>

    </body>
</html>
