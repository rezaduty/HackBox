<Global.Microsoft.VisualBasic.CompilerServices.DesignerGenerated()> _
Partial Class Form1
    Inherits System.Windows.Forms.Form

    'Form reemplaza a Dispose para limpiar la lista de componentes.
    <System.Diagnostics.DebuggerNonUserCode()> _
    Protected Overrides Sub Dispose(ByVal disposing As Boolean)
        Try
            If disposing AndAlso components IsNot Nothing Then
                components.Dispose()
            End If
        Finally
            MyBase.Dispose(disposing)
        End Try
    End Sub

    'Requerido por el Diseñador de Windows Forms
    Private components As System.ComponentModel.IContainer

    'NOTA: el Diseñador de Windows Forms necesita el siguiente procedimiento
    'Se puede modificar usando el Diseñador de Windows Forms.  
    'No lo modifique con el editor de código.
    <System.Diagnostics.DebuggerStepThrough()> _
    Private Sub InitializeComponent()
        Dim resources As System.ComponentModel.ComponentResourceManager = New System.ComponentModel.ComponentResourceManager(GetType(Form1))
        Me.BlackShadesNetForm1 = New Level_Encryptor.BlackShadesNetForm
        Me.PictureBox1 = New System.Windows.Forms.PictureBox
        Me.TextBox1 = New Level_Encryptor.BlackShadesNetMultiLineTextBox
        Me.BlackShadesNetButton2 = New Level_Encryptor.BlackShadesNetButton
        Me.LinkLabel1 = New System.Windows.Forms.LinkLabel
        Me.BlackShadesNetButton1 = New Level_Encryptor.BlackShadesNetButton
        Me.BlackShadesNetForm1.SuspendLayout()
        CType(Me.PictureBox1, System.ComponentModel.ISupportInitialize).BeginInit()
        Me.SuspendLayout()
        '
        'BlackShadesNetForm1
        '
        Me.BlackShadesNetForm1.CloseButtonExitsApp = False
        Me.BlackShadesNetForm1.Controls.Add(Me.PictureBox1)
        Me.BlackShadesNetForm1.Controls.Add(Me.TextBox1)
        Me.BlackShadesNetForm1.Controls.Add(Me.BlackShadesNetButton2)
        Me.BlackShadesNetForm1.Controls.Add(Me.LinkLabel1)
        Me.BlackShadesNetForm1.Controls.Add(Me.BlackShadesNetButton1)
        Me.BlackShadesNetForm1.Dock = System.Windows.Forms.DockStyle.Fill
        Me.BlackShadesNetForm1.Font = New System.Drawing.Font("Cambria", 8.25!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.BlackShadesNetForm1.ForeColor = System.Drawing.Color.FromArgb(CType(CType(142, Byte), Integer), CType(CType(152, Byte), Integer), CType(CType(156, Byte), Integer))
        Me.BlackShadesNetForm1.Location = New System.Drawing.Point(0, 0)
        Me.BlackShadesNetForm1.MinimizeButton = True
        Me.BlackShadesNetForm1.Name = "BlackShadesNetForm1"
        Me.BlackShadesNetForm1.Size = New System.Drawing.Size(408, 244)
        Me.BlackShadesNetForm1.TabIndex = 0
        Me.BlackShadesNetForm1.Text = "Level-23 | Enc/Dec"
        '
        'PictureBox1
        '
        Me.PictureBox1.BackColor = System.Drawing.Color.Transparent
        Me.PictureBox1.Image = CType(resources.GetObject("PictureBox1.Image"), System.Drawing.Image)
        Me.PictureBox1.Location = New System.Drawing.Point(6, 25)
        Me.PictureBox1.Name = "PictureBox1"
        Me.PictureBox1.Size = New System.Drawing.Size(397, 82)
        Me.PictureBox1.TabIndex = 12
        Me.PictureBox1.TabStop = False
        '
        'TextBox1
        '
        Me.TextBox1.BackColor = System.Drawing.Color.FromArgb(CType(CType(36, Byte), Integer), CType(CType(40, Byte), Integer), CType(CType(42, Byte), Integer))
        Me.TextBox1.Font = New System.Drawing.Font("Cambria", 8.25!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.TextBox1.ForeColor = System.Drawing.Color.Yellow
        Me.TextBox1.Location = New System.Drawing.Point(12, 113)
        Me.TextBox1.MaxCharacters = 32767
        Me.TextBox1.Name = "TextBox1"
        Me.TextBox1.Size = New System.Drawing.Size(384, 73)
        Me.TextBox1.TabIndex = 9
        Me.TextBox1.Text = "Encrypt/Decrypt Text Here!"
        Me.TextBox1.TextAlignment = System.Windows.Forms.HorizontalAlignment.Center
        '
        'BlackShadesNetButton2
        '
        Me.BlackShadesNetButton2.BackColor = System.Drawing.Color.FromArgb(CType(CType(38, Byte), Integer), CType(CType(38, Byte), Integer), CType(CType(38, Byte), Integer))
        Me.BlackShadesNetButton2.Font = New System.Drawing.Font("Cambria", 8.25!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.BlackShadesNetButton2.ForeColor = System.Drawing.Color.White
        Me.BlackShadesNetButton2.Location = New System.Drawing.Point(215, 187)
        Me.BlackShadesNetButton2.Name = "BlackShadesNetButton2"
        Me.BlackShadesNetButton2.Size = New System.Drawing.Size(181, 30)
        Me.BlackShadesNetButton2.TabIndex = 10
        Me.BlackShadesNetButton2.Text = "Decrypt"
        Me.BlackShadesNetButton2.TextAlignment = System.Drawing.StringAlignment.Center
        '
        'LinkLabel1
        '
        Me.LinkLabel1.AutoSize = True
        Me.LinkLabel1.BackColor = System.Drawing.Color.Transparent
        Me.LinkLabel1.Font = New System.Drawing.Font("Cambria", 8.25!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.LinkLabel1.LinkColor = System.Drawing.Color.White
        Me.LinkLabel1.Location = New System.Drawing.Point(148, 220)
        Me.LinkLabel1.Name = "LinkLabel1"
        Me.LinkLabel1.Size = New System.Drawing.Size(113, 12)
        Me.LinkLabel1.TabIndex = 7
        Me.LinkLabel1.TabStop = True
        Me.LinkLabel1.Text = "LeVeL-23.info  |  Hum"
        '
        'BlackShadesNetButton1
        '
        Me.BlackShadesNetButton1.BackColor = System.Drawing.Color.FromArgb(CType(CType(38, Byte), Integer), CType(CType(38, Byte), Integer), CType(CType(38, Byte), Integer))
        Me.BlackShadesNetButton1.Font = New System.Drawing.Font("Cambria", 8.25!, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, CType(0, Byte))
        Me.BlackShadesNetButton1.ForeColor = System.Drawing.Color.White
        Me.BlackShadesNetButton1.Location = New System.Drawing.Point(12, 187)
        Me.BlackShadesNetButton1.Name = "BlackShadesNetButton1"
        Me.BlackShadesNetButton1.Size = New System.Drawing.Size(185, 30)
        Me.BlackShadesNetButton1.TabIndex = 3
        Me.BlackShadesNetButton1.Text = "Encrypt"
        Me.BlackShadesNetButton1.TextAlignment = System.Drawing.StringAlignment.Center
        '
        'Form1
        '
        Me.AutoScaleDimensions = New System.Drawing.SizeF(6.0!, 13.0!)
        Me.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font
        Me.ClientSize = New System.Drawing.Size(408, 244)
        Me.Controls.Add(Me.BlackShadesNetForm1)
        Me.FormBorderStyle = System.Windows.Forms.FormBorderStyle.None
        Me.Name = "Form1"
        Me.Text = "Level-23 | Enc/Dec"
        Me.TransparencyKey = System.Drawing.Color.Fuchsia
        Me.BlackShadesNetForm1.ResumeLayout(False)
        Me.BlackShadesNetForm1.PerformLayout()
        CType(Me.PictureBox1, System.ComponentModel.ISupportInitialize).EndInit()
        Me.ResumeLayout(False)

    End Sub
    Friend WithEvents BlackShadesNetForm1 As Level_Encryptor.BlackShadesNetForm
    Friend WithEvents BlackShadesNetButton1 As Level_Encryptor.BlackShadesNetButton
    Friend WithEvents LinkLabel1 As System.Windows.Forms.LinkLabel
    Friend WithEvents BlackShadesNetButton2 As Level_Encryptor.BlackShadesNetButton
    Friend WithEvents TextBox1 As Level_Encryptor.BlackShadesNetMultiLineTextBox
    Friend WithEvents PictureBox1 As System.Windows.Forms.PictureBox

End Class
