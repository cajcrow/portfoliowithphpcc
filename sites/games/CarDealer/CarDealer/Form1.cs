using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace CarDealer
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }
        private void checkBox1_CheckedChanged(object sender, EventArgs e)
        {
            if (checkBox1.Checked)
            {
                EliteForm eliteForm = new EliteForm();
                eliteForm.ShowDialog();
                checkBox1.Checked = false;  //causes check to go away once modal window (elite) is closed
            }
        }
        private void checkBox2_CheckedChanged(object sender, EventArgs e)
        {
            if (checkBox2.Checked)
            {
                CheetahForm cheetahForm = new CheetahForm();
                cheetahForm.ShowDialog();
                checkBox2.Checked = false;
            }
        }
        private void checkBox3_CheckedChanged(object sender, EventArgs e)
        {
            if (checkBox3.Checked)
            {
                CentsForm centsForm = new CentsForm();
                centsForm.ShowDialog();
                checkBox3.Checked = false;
            }
        }
    }
}
