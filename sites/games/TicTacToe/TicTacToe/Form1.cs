using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace TicTacToe
{
    public partial class Form1 : Form
    {
        bool turn = true;   // true = X turn; false = Y turn
        int turn_count = 0;
        //static string player1, player2;

        public Form1()
        {
            InitializeComponent();
        }

        /*public static void setPlayerNames(string n1, string n2)
        {
            player1 = n1;
            player2 = n2;
        }*/

        private void aboutToolStripMenuItem_Click(object sender, EventArgs e)
        {
            MessageBox.Show("By Caleb", "Tic Tac Toe About");
        }

        private void exitToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void button_click(object sender, EventArgs e)
        {
            Button b = (Button)sender;
            if(turn)
            {
                b.Text = "X";
            }
            else
            {
                b.Text = "O";
            }
            turn = !turn;
            b.Enabled = false;
            ++turn_count;
            checkForWinner();
        }//end buttonclick

        private void checkForWinner()
        {
            bool winner = false;
            //HORIZONTAL CHECKS
            if ((A1.Text == A2.Text) && (A2.Text == A3.Text) && (!A1.Enabled))
                winner = true;
            else if ((B1.Text == B2.Text) && (B2.Text == B3.Text) && (!B1.Enabled))
                winner = true;
            else if ((C1.Text == C2.Text) && (C2.Text == C3.Text) && (!C1.Enabled))
                winner = true;
            //VERTICAL CHECKS
            else if ((A1.Text == B1.Text) && (B1.Text == C1.Text) && (!A1.Enabled))
                winner = true;
            else if ((A2.Text == B2.Text) && (B2.Text == C2.Text) && (!A2.Enabled))
                winner = true;
            else if ((A3.Text == B3.Text) && (B3.Text == C3.Text) && (!A3.Enabled))
                winner = true;
            //DIAGONAL CHECKS
            else if ((A1.Text == B2.Text) && (B2.Text == C3.Text) && (!A1.Enabled))
                winner = true;
            else if ((A3.Text == B2.Text) && (B2.Text == C1.Text) && (!C1.Enabled))
                winner = true;

            if (winner)
            {
                disableButtons();
                string whoWon = "";
                if (turn)
                {
                    whoWon = p2.Text;
                    oWinCount.Text = (Int32.Parse(oWinCount.Text) + 1).ToString();
                }
                else
                {
                    whoWon = p1.Text;
                    xWinCount.Text = (Int32.Parse(xWinCount.Text) + 1).ToString();
                }
                MessageBox.Show(whoWon + " Wins!", "Yay!");
            }
            else
            {
                if(turn_count == 9)
                {
                    MessageBox.Show("It's a draw!", "Bummer!");
                    drawCount.Text = (Int32.Parse(drawCount.Text) + 1).ToString();
                }
            }

        }//end checkforwinner

        private void disableButtons()
        {
            foreach (Control c in Controls)
            {
                try
                {
                    Button b = (Button)c;
                    b.Enabled = false;
                }
                catch { }
            } // foreach
        }//end disablebuttons

        private void newGameToolStripMenuItem_Click(object sender, EventArgs e)
        {
            turn = true;
            turn_count = 0;

            foreach (Control c in Controls)
            {
                try
                {
                    Button b = (Button)c;
                    b.Enabled = true;
                    b.Text = "";
                }
                catch { }
            } // foreach
        }

        private void button_enter(object sender, EventArgs e)
        {
            Button b = (Button)sender;
            if (turn)
            {
                b.Text = "X";
            }
            else
            {
                b.Text = "O";
            }
        }

        private void button_leave(object sender, EventArgs e)
        {
            Button b = (Button)sender;
            if (b.Enabled)
            {
                b.Text = "";
            }
        }

        private void resetWinCountToolStripMenuItem_Click(object sender, EventArgs e)
        {
            oWinCount.Text = "0";
            xWinCount.Text = "0";
            drawCount.Text = "0";
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            /*Form2 f2 = new Form2();
            f2.ShowDialog();    //showdialog as opposed to just show will only show the specified form then form1 after rather than both
            p1.Text = player1;
            p2.Text = player2;*/
        }
    }
}
