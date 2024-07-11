import mechanicalsoup

 
from openpyxl import load_workbook


data_file = 'artigo.xlsx'

# Load the entire workbook.
wb = load_workbook(data_file)

# Load one worksheet.
ws = wb.worksheets[4]
wsl = wb.worksheets[4]
all_rows = list(ws.rows)
all_rowsl = list(wsl.rows)



for row in all_rows[2:3]:
    srig=row[2].value
    print(srig)
    
    for i in range(len(srig)):
        h=1
        for row in all_rows[3:20]:
            sriga=row[2].value
            k=0
            for j in range(len(sriga)):
                
                if(srig[i]==sriga[j]):
                    
                    k=k+1
            if(k>0):
                h=h*1
            else:
                h=h*0
        if(h==1):
            print(srig[i])

